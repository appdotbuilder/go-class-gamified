<?php

namespace App\Http\Controllers;

use App\Models\SiswaData;
use App\Models\Level;
use App\Models\Aktivitas;
use App\Models\PelanggaranSiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the main dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        if ($user->role === 'siswa') {
            /** @var \App\Models\SiswaData|null $siswaData */
            $siswaData = $user->siswaData()->with('currentLevel')->first();
            
            if (!$siswaData) {
                return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
            }

            // Get next level
            $currentStars = $siswaData->total_bintang;
            $currentBadges = $siswaData->total_badge;
            $nextLevel = Level::where('min_bintang', '>', $currentStars)
                ->orWhere(function($query) use ($currentStars, $currentBadges) {
                    $query->where('min_bintang', '=', $currentStars)
                          ->where('min_badge', '>', $currentBadges);
                })
                ->orderBy('min_bintang')
                ->orderBy('min_badge')
                ->first();

            // Get recent violations
            $siswaId = $siswaData->id;
            $recentViolations = PelanggaranSiswa::where('siswa_id', $siswaId)
                ->with(['pelanggaranJenis', 'guru'])
                ->latest()
                ->limit(5)
                ->get();

            // Get available activities
            $availableActivities = Aktivitas::aktif()
                ->where('tanggal', '>=', now())
                ->latest()
                ->limit(5)
                ->get();

            // Calculate progress to next level
            $progressPercentage = 0;
            if ($nextLevel) {
                $neededStars = max(0, $nextLevel->min_bintang - $currentStars);
                $neededBadges = max(0, $nextLevel->min_badge - $currentBadges);
                
                if ($neededStars <= 0 && $neededBadges <= 0) {
                    $progressPercentage = 100;
                } else {
                    $starsProgress = $neededStars > 0 ? (1 - ($neededStars / max(1, $nextLevel->min_bintang))) * 50 : 50;
                    $badgesProgress = $neededBadges > 0 ? (1 - ($neededBadges / max(1, $nextLevel->min_badge))) * 50 : 50;
                    $progressPercentage = max(0, min(100, $starsProgress + $badgesProgress));
                }
            }

            return Inertia::render('dashboard/siswa', [
                'siswaData' => $siswaData,
                'nextLevel' => $nextLevel,
                'progressPercentage' => $progressPercentage,
                'recentViolations' => $recentViolations,
                'availableActivities' => $availableActivities,
            ]);
        } elseif ($user->role === 'guru') {
            $totalSiswa = SiswaData::count();
            $recentActivities = Aktivitas::latest()->limit(5)->get();
            $recentViolations = PelanggaranSiswa::with(['siswa.user', 'pelanggaranJenis'])
                ->latest()
                ->limit(10)
                ->get();

            return Inertia::render('dashboard/guru', [
                'totalSiswa' => $totalSiswa,
                'recentActivities' => $recentActivities,
                'recentViolations' => $recentViolations,
            ]);
        } else {
            $stats = [
                'total_siswa' => SiswaData::count(),
                'total_guru' => User::guru()->count(),
                'total_aktivitas' => Aktivitas::count(),
                'total_pelanggaran' => PelanggaranSiswa::count(),
            ];

            $topSiswa = SiswaData::with(['user', 'currentLevel'])
                ->orderBy('total_bintang', 'desc')
                ->orderBy('total_badge', 'desc')
                ->limit(10)
                ->get();

            return Inertia::render('dashboard/admin', [
                'stats' => $stats,
                'topSiswa' => $topSiswa,
            ]);
        }
    }
}