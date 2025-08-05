<?php

namespace Database\Seeders;

use App\Models\BadgeDefinition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BadgeDefinitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $badges = [
            [
                'nama' => 'Rajin Hadir',
                'deskripsi' => 'Badge untuk siswa yang tidak pernah absen selama 1 bulan',
                'icon' => '📅',
                'color' => '#10B981',
                'kategori' => 'kehadiran',
            ],
            [
                'nama' => 'Tugas Tepat Waktu',
                'deskripsi' => 'Badge untuk siswa yang selalu mengumpulkan tugas tepat waktu',
                'icon' => '⏰',
                'color' => '#3B82F6',
                'kategori' => 'tugas',
            ],
            [
                'nama' => 'Perilaku Terpuji',
                'deskripsi' => 'Badge untuk siswa dengan perilaku yang baik dan sopan',
                'icon' => '😊',
                'color' => '#8B5CF6',
                'kategori' => 'perilaku',
            ],
            [
                'nama' => 'Juara Kelas',
                'deskripsi' => 'Badge untuk siswa terbaik di kelasnya',
                'icon' => '🥇',
                'color' => '#F59E0B',
                'kategori' => 'prestasi',
            ],
            [
                'nama' => 'Pembantu Teman',
                'deskripsi' => 'Badge untuk siswa yang suka membantu teman-temannya',
                'icon' => '🤝',
                'color' => '#EF4444',
                'kategori' => 'perilaku',
            ],
            [
                'nama' => 'Kreatif',
                'deskripsi' => 'Badge untuk siswa yang menunjukkan kreativitas tinggi',
                'icon' => '🎨',
                'color' => '#EC4899',
                'kategori' => 'prestasi',
            ],
        ];

        foreach ($badges as $badge) {
            BadgeDefinition::create($badge);
        }
    }
}