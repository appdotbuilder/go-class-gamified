import React from 'react';
import { Head } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';

interface SiswaData {
    id: number;
    nis: string;
    kelas: string;
    total_bintang: number;
    total_badge: number;
    current_level?: {
        id: number;
        nama: string;
        icon: string;
        color: string;
        deskripsi: string;
    };
    user: {
        name: string;
        avatar?: string;
    };
}

interface Level {
    id: number;
    nama: string;
    min_bintang: number;
    min_badge: number;
    icon: string;
    color: string;
}

interface Violation {
    id: number;
    tanggal: string;
    catatan?: string;
    pelanggaran_jenis: {
        jenis: string;
        tingkat: string;
        pengurang_bintang: number;
        pengurang_badge: number;
    };
    guru: {
        name: string;
    };
}

interface Activity {
    id: number;
    nama: string;
    deskripsi: string;
    tanggal: string;
    bintang_reward: number;
    badge_reward: number;
}

interface Props {
    siswaData: SiswaData;
    nextLevel?: Level;
    progressPercentage: number;
    recentViolations: Violation[];
    availableActivities: Activity[];
    [key: string]: unknown;
}

export default function SiswaDashboard({ 
    siswaData, 
    nextLevel, 
    progressPercentage, 
    recentViolations, 
    availableActivities 
}: Props) {
    const currentTime = new Date().getHours();
    const greeting = currentTime < 12 ? 'Selamat Pagi' : currentTime < 17 ? 'Selamat Siang' : 'Selamat Malam';

    return (
        <AppShell>
            <Head title="Dashboard Siswa - Go Class" />
            
            <div className="space-y-6">
                {/* Welcome Section */}
                <div className="bg-gradient-to-r from-blue-500 to-green-500 rounded-2xl p-8 text-white">
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-3xl font-bold mb-2">
                                🌟 {greeting}, {siswaData.user.name}!
                            </h1>
                            <p className="text-blue-100 text-lg">
                                Selamat datang kembali di Go Class. Mari lanjutkan perjalanan belajarmu!
                            </p>
                        </div>
                        <div className="text-6xl">
                            {siswaData.current_level?.icon || '🎯'}
                        </div>
                    </div>
                </div>

                {/* Stats Cards */}
                <div className="grid md:grid-cols-3 gap-6">
                    {/* Stars Card */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">⭐</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-yellow-600">
                                    {siswaData.total_bintang}
                                </div>
                                <div className="text-sm text-gray-500">Total Bintang</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Kumpulkan lebih banyak bintang dengan menyelesaikan aktivitas!
                        </div>
                    </div>

                    {/* Badges Card */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">🏅</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-orange-600">
                                    {siswaData.total_badge}
                                </div>
                                <div className="text-sm text-gray-500">Total Badge</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Badge menunjukkan pencapaian khususmu dalam belajar!
                        </div>
                    </div>

                    {/* Level Card */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">
                                {siswaData.current_level?.icon || '🎯'}
                            </div>
                            <div className="text-right">
                                <div className="text-lg font-bold" style={{ color: siswaData.current_level?.color || '#3B82F6' }}>
                                    {siswaData.current_level?.nama || 'Belum Ada Level'}
                                </div>
                                <div className="text-sm text-gray-500">Level Saat Ini</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            {siswaData.current_level?.deskripsi || 'Tingkatkan performa untuk mendapatkan level!'}
                        </div>
                    </div>
                </div>

                {/* Progress to Next Level */}
                {nextLevel && (
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <h2 className="text-xl font-semibold text-gray-800">
                                🚀 Progress ke Level Berikutnya
                            </h2>
                            <div className="flex items-center space-x-2">
                                <span className="text-2xl">{nextLevel.icon}</span>
                                <span className="font-semibold" style={{ color: nextLevel.color }}>
                                    {nextLevel.nama}
                                </span>
                            </div>
                        </div>
                        
                        <div className="mb-4">
                            <div className="flex justify-between text-sm text-gray-600 mb-2">
                                <span>Progress</span>
                                <span>{Math.round(progressPercentage)}%</span>
                            </div>
                            <div className="w-full bg-gray-200 rounded-full h-3">
                                <div 
                                    className="bg-gradient-to-r from-blue-500 to-green-500 h-3 rounded-full transition-all duration-300"
                                    style={{ width: `${progressPercentage}%` }}
                                ></div>
                            </div>
                        </div>
                        
                        <div className="grid md:grid-cols-2 gap-4 text-sm">
                            <div className="flex items-center space-x-2">
                                <span>⭐</span>
                                <span>
                                    Perlu {Math.max(0, nextLevel.min_bintang - siswaData.total_bintang)} bintang lagi
                                </span>
                            </div>
                            <div className="flex items-center space-x-2">
                                <span>🏅</span>
                                <span>
                                    Perlu {Math.max(0, nextLevel.min_badge - siswaData.total_badge)} badge lagi
                                </span>
                            </div>
                        </div>
                    </div>
                )}

                {/* Content Grid */}
                <div className="grid lg:grid-cols-2 gap-6">
                    {/* Available Activities */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h2 className="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            📚 Aktivitas Tersedia
                        </h2>
                        
                        {availableActivities.length > 0 ? (
                            <div className="space-y-4">
                                {availableActivities.map((activity) => (
                                    <div key={activity.id} className="border border-gray-200 rounded-lg p-4 hover:border-blue-300 transition-colors">
                                        <div className="flex justify-between items-start mb-2">
                                            <h3 className="font-medium text-gray-800">
                                                {activity.nama}
                                            </h3>
                                            <div className="flex items-center space-x-2 text-sm">
                                                <span className="text-yellow-600">⭐ {activity.bintang_reward}</span>
                                                {activity.badge_reward > 0 && (
                                                    <span className="text-orange-600">🏅 {activity.badge_reward}</span>
                                                )}
                                            </div>
                                        </div>
                                        <p className="text-sm text-gray-600 mb-2">
                                            {activity.deskripsi}
                                        </p>
                                        <div className="text-xs text-gray-500">
                                            📅 {new Date(activity.tanggal).toLocaleDateString('id-ID')}
                                        </div>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <div className="text-center py-8 text-gray-500">
                                <div className="text-4xl mb-2">📝</div>
                                <p>Belum ada aktivitas baru</p>
                            </div>
                        )}
                    </div>

                    {/* Recent Violations */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h2 className="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            ⚠️ Riwayat Pelanggaran
                        </h2>
                        
                        {recentViolations.length > 0 ? (
                            <div className="space-y-4">
                                {recentViolations.map((violation) => (
                                    <div key={violation.id} className="border border-red-200 rounded-lg p-4 bg-red-50">
                                        <div className="flex justify-between items-start mb-2">
                                            <h3 className="font-medium text-gray-800">
                                                {violation.pelanggaran_jenis.jenis}
                                            </h3>
                                            <span className={`text-xs px-2 py-1 rounded-full ${
                                                violation.pelanggaran_jenis.tingkat === 'ringan' ? 'bg-yellow-100 text-yellow-800' :
                                                violation.pelanggaran_jenis.tingkat === 'sedang' ? 'bg-orange-100 text-orange-800' :
                                                'bg-red-100 text-red-800'
                                            }`}>
                                                {violation.pelanggaran_jenis.tingkat}
                                            </span>
                                        </div>
                                        <div className="text-sm text-gray-600 mb-2">
                                            <div>👨‍🏫 {violation.guru.name}</div>
                                            <div>📅 {new Date(violation.tanggal).toLocaleDateString('id-ID')}</div>
                                        </div>
                                        <div className="flex items-center space-x-4 text-xs text-red-600">
                                            <span>⭐ -{violation.pelanggaran_jenis.pengurang_bintang}</span>
                                            {violation.pelanggaran_jenis.pengurang_badge > 0 && (
                                                <span>🏅 -{violation.pelanggaran_jenis.pengurang_badge}</span>
                                            )}
                                        </div>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <div className="text-center py-8 text-gray-500">
                                <div className="text-4xl mb-2">✅</div>
                                <p>Tidak ada pelanggaran. Pertahankan!</p>
                            </div>
                        )}
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h2 className="text-xl font-semibold text-gray-800 mb-4">
                        🎯 Menu Cepat
                    </h2>
                    <div className="grid md:grid-cols-4 gap-4">
                        <Button className="h-20 flex flex-col items-center justify-center bg-blue-50 text-blue-600 hover:bg-blue-100 border-blue-200">
                            <span className="text-2xl mb-1">🏆</span>
                            <span className="text-sm">Leaderboard</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-green-50 text-green-600 hover:bg-green-100 border-green-200">
                            <span className="text-2xl mb-1">👤</span>
                            <span className="text-sm">Profil</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-purple-50 text-purple-600 hover:bg-purple-100 border-purple-200">
                            <span className="text-2xl mb-1">📊</span>
                            <span className="text-sm">Statistik</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-orange-50 text-orange-600 hover:bg-orange-100 border-orange-200">
                            <span className="text-2xl mb-1">🏅</span>
                            <span className="text-sm">Badge Saya</span>
                        </Button>
                    </div>
                </div>
            </div>
        </AppShell>
    );
}