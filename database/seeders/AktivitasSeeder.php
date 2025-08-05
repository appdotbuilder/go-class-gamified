<?php

namespace Database\Seeders;

use App\Models\Aktivitas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AktivitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aktivitas = [
            [
                'nama' => 'Lomba Pidato Bahasa Indonesia',
                'deskripsi' => 'Kompetisi pidato tingkat sekolah dengan tema "Cinta Tanah Air"',
                'tanggal' => Carbon::now()->addDays(7),
                'bintang_reward' => 15,
                'badge_reward' => 1,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Olimpiade Matematika',
                'deskripsi' => 'Kompetisi matematika untuk siswa berprestasi',
                'tanggal' => Carbon::now()->addDays(14),
                'bintang_reward' => 20,
                'badge_reward' => 1,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Proyek Kebun Sekolah',
                'deskripsi' => 'Kegiatan menanam dan merawat tanaman di kebun sekolah',
                'tanggal' => Carbon::now()->addDays(3),
                'bintang_reward' => 10,
                'badge_reward' => 0,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Bakti Sosial',
                'deskripsi' => 'Kegiatan membantu masyarakat sekitar sekolah',
                'tanggal' => Carbon::now()->addDays(21),
                'bintang_reward' => 12,
                'badge_reward' => 1,
                'status' => 'aktif',
            ],
            [
                'nama' => 'Festival Seni dan Budaya',
                'deskripsi' => 'Pertunjukan seni dan budaya tingkat sekolah',
                'tanggal' => Carbon::now()->addDays(30),
                'bintang_reward' => 18,
                'badge_reward' => 1,
                'status' => 'aktif',
            ],
        ];

        foreach ($aktivitas as $item) {
            Aktivitas::create($item);
        }
    }
}