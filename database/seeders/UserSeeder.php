<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SiswaData;
use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'email' => 'admin@goclass.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        // Create guru users
        $guru1 = User::create([
            'name' => 'Budi Santoso',
            'username' => 'budi.guru',
            'email' => 'budi@goclass.com',
            'password' => Hash::make('password123'),
            'role' => 'guru',
        ]);

        $guru2 = User::create([
            'name' => 'Sari Dewi',
            'username' => 'sari.guru',
            'email' => 'sari@goclass.com',
            'password' => Hash::make('password123'),
            'role' => 'guru',
        ]);

        // Get the first level for new students
        $firstLevel = Level::orderBy('min_bintang')->first();

        // Create sample siswa users
        $siswaData = [
            [
                'name' => 'Ahmad Faisal',
                'nis' => '2024001',
                'kelas' => 'X-A',
                'total_bintang' => 25,
                'total_badge' => 2,
            ],
            [
                'name' => 'Siti Nurhaliza',
                'nis' => '2024002',
                'kelas' => 'X-A',
                'total_bintang' => 45,
                'total_badge' => 3,
            ],
            [
                'name' => 'Rudi Prasetyo',
                'nis' => '2024003',
                'kelas' => 'X-B',
                'total_bintang' => 15,
                'total_badge' => 1,
            ],
            [
                'name' => 'Maya Sari',
                'nis' => '2024004',
                'kelas' => 'X-B',
                'total_bintang' => 35,
                'total_badge' => 2,
            ],
            [
                'name' => 'Dimas Pratama',
                'nis' => '2024005',
                'kelas' => 'X-C',
                'total_bintang' => 55,
                'total_badge' => 4,
            ],
        ];

        foreach ($siswaData as $data) {
            $user = User::create([
                'name' => $data['name'],
                'username' => $data['nis'],
                'email' => strtolower(str_replace(' ', '.', $data['name'])) . '@student.goclass.com',
                'password' => Hash::make('password123'),
                'role' => 'siswa',
            ]);

            $siswa = SiswaData::create([
                'user_id' => $user->id,
                'nis' => $data['nis'],
                'kelas' => $data['kelas'],
                'total_bintang' => $data['total_bintang'],
                'total_badge' => $data['total_badge'],
                'current_level_id' => $firstLevel?->id,
            ]);

            // Update level based on stars and badges
            $siswa->updateLevel();
        }
    }
}