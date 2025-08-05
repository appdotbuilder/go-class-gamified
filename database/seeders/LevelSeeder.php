<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'nama' => 'Pemula',
                'min_bintang' => 0,
                'min_badge' => 0,
                'deskripsi' => 'Level untuk siswa baru yang baru memulai perjalanan belajar',
                'icon' => '🌱',
                'color' => '#10B981',
            ],
            [
                'nama' => 'Berkembang',
                'min_bintang' => 10,
                'min_badge' => 0,
                'deskripsi' => 'Siswa yang mulai menunjukkan kemajuan dalam belajar',
                'icon' => '🌿',
                'color' => '#3B82F6',
            ],
            [
                'nama' => 'Kompeten',
                'min_bintang' => 25,
                'min_badge' => 1,
                'deskripsi' => 'Siswa dengan kemampuan yang baik dan mulai meraih prestasi',
                'icon' => '🌳',
                'color' => '#8B5CF6',
            ],
            [
                'nama' => 'Mahir',
                'min_bintang' => 50,
                'min_badge' => 3,
                'deskripsi' => 'Siswa yang sudah mahir dan berprestasi tinggi',
                'icon' => '⭐',
                'color' => '#F59E0B',
            ],
            [
                'nama' => 'Expert',
                'min_bintang' => 100,
                'min_badge' => 5,
                'deskripsi' => 'Siswa dengan prestasi luar biasa dan menjadi teladan',
                'icon' => '🏆',
                'color' => '#DC2626',
            ],
        ];

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}