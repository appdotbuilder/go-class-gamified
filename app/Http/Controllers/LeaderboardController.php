<?php

namespace App\Http\Controllers;

use App\Models\SiswaData;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LeaderboardController extends Controller
{
    /**
     * Display the leaderboard.
     */
    public function index(Request $request)
    {
        $kelas = $request->input('kelas');
        
        $query = SiswaData::with(['user', 'currentLevel'])
            ->orderByDesc('total_bintang')
            ->orderByDesc('total_badge');
            
        if ($kelas) {
            $query->where('kelas', $kelas);
        }
        
        $leaderboard = $query->limit(10)->get();
        $availableClasses = SiswaData::distinct()->pluck('kelas')->sort()->values();
        
        return Inertia::render('leaderboard', [
            'leaderboard' => $leaderboard,
            'availableClasses' => $availableClasses,
            'selectedClass' => $kelas,
        ]);
    }
}