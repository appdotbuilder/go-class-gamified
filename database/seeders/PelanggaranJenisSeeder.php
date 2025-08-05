<?php

namespace Database\Seeders;

use App\Models\PelanggaranJenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelanggaranJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggaran = [
            [
                'jenis' => 'Terlambat Masuk Kelas',
                'deskripsi' => 'Siswa datang terlambat ke kelas tanpa alasan yang jelas',
                'pengurang_bintang' => 2,
                'pengurang_badge' => 0,
                'tingkat' => 'ringan',
            ],
            [
                'jenis' => 'Tidak Mengerjakan Tugas',
                'deskripsi' => 'Siswa tidak mengumpulkan tugas yang diberikan guru',
                'pengurang_bintang' => 5,
                'pengurang_badge' => 0,
                'tingkat' => 'sedang',
            ],
            [
                'jenis' => 'Ribut di Kelas',
                'deskripsi' => 'Siswa membuat keributan yang mengganggu proses belajar',
                'pengurang_bintang' => 3,
                'pengurang_badge' => 0,
                'tingkat' => 'ringan',
            ],
            [
                'jenis' => 'Tidak Sopan ke Guru',
                'deskripsi' => 'Siswa bersikap tidak sopan atau kurang ajar kepada guru',
                'pengurang_bintang' => 10,
                'pengurang_badge' => 1,
                'tingkat' => 'berat',
            ],
            [
                'jenis' => 'Membolos',
                'deskripsi' => 'Siswa tidak masuk sekolah tanpa izin atau keterangan',
                'pengurang_bintang' => 8,
                'pengurang_badge' => 0,
                'tingkat' => 'sedang',
            ],
            [
                'jenis' => 'Berkelahi',
                'deskripsi' => 'Siswa terlibat perkelahian dengan siswa lain',
                'pengurang_bintang' => 15,
                'pengurang_badge' => 2,
                'tingkat' => 'berat',
            ],
        ];

        foreach ($pelanggaran as $item) {
            PelanggaranJenis::create($item);
        }
    }
}