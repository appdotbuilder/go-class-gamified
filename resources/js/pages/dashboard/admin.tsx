import React from 'react';
import { Head } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';

interface Stats {
    total_siswa: number;
    total_guru: number;
    total_aktivitas: number;
    total_pelanggaran: number;
}

interface TopSiswa {
    id: number;
    nis: string;
    kelas: string;
    total_bintang: number;
    total_badge: number;
    user: {
        name: string;
        avatar?: string;
    };
    current_level?: {
        nama: string;
        icon: string;
        color: string;
    };
}

interface Props {
    stats: Stats;
    topSiswa: TopSiswa[];
    [key: string]: unknown;
}

export default function AdminDashboard({ stats, topSiswa }: Props) {
    return (
        <AppShell>
            <Head title="Dashboard Admin - Go Class" />
            
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl p-8 text-white">
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-3xl font-bold mb-2">
                                👑 Dashboard Admin
                            </h1>
                            <p className="text-purple-100 text-lg">
                                Kelola seluruh sistem Go Class dan pantau performa pembelajaran
                            </p>
                        </div>
                        <div className="text-6xl">🎛️</div>
                    </div>
                </div>

                {/* Stats Cards */}
                <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">👥</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-blue-600">
                                    {stats.total_siswa}
                                </div>
                                <div className="text-sm text-gray-500">Total Siswa</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Siswa yang terdaftar di sistem
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">👨‍🏫</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-green-600">
                                    {stats.total_guru}
                                </div>
                                <div className="text-sm text-gray-500">Total Guru</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Guru yang terdaftar di sistem
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">📚</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-purple-600">
                                    {stats.total_aktivitas}
                                </div>
                                <div className="text-sm text-gray-500">Total Aktivitas</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Aktivitas pembelajaran yang dibuat
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">⚠️</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-red-600">
                                    {stats.total_pelanggaran}
                                </div>
                                <div className="text-sm text-gray-500">Total Pelanggaran</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Pelanggaran yang tercatat
                        </div>
                    </div>
                </div>

                {/* Admin Actions */}
                <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h2 className="text-xl font-semibold text-gray-800 mb-4">
                        🛠️ Panel Admin
                    </h2>
                    <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <Button className="h-20 flex flex-col items-center justify-center bg-blue-50 text-blue-600 hover:bg-blue-100 border-blue-200">
                            <span className="text-2xl mb-1">👥</span>
                            <span className="text-sm">Kelola Siswa</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-green-50 text-green-600 hover:bg-green-100 border-green-200">
                            <span className="text-2xl mb-1">📚</span>
                            <span className="text-sm">Kelola Aktivitas</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-purple-50 text-purple-600 hover:bg-purple-100 border-purple-200">
                            <span className="text-2xl mb-1">🏆</span>
                            <span className="text-sm">Kelola Level</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-red-50 text-red-600 hover:bg-red-100 border-red-200">
                            <span className="text-2xl mb-1">⚠️</span>
                            <span className="text-sm">Kelola Pelanggaran</span>
                        </Button>
                    </div>
                </div>

                <div className="grid lg:grid-cols-2 gap-6">
                    {/* Additional Actions */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h2 className="text-xl font-semibold text-gray-800 mb-4">
                            ⚙️ Pengaturan Sistem
                        </h2>
                        <div className="space-y-3">
                            <Button variant="outline" className="w-full justify-start h-12">
                                <span className="text-xl mr-3">🏅</span>
                                Kelola Badge Definitions
                            </Button>
                            <Button variant="outline" className="w-full justify-start h-12">
                                <span className="text-xl mr-3">📊</span>
                                Laporan & Analitik
                            </Button>
                            <Button variant="outline" className="w-full justify-start h-12">
                                <span className="text-xl mr-3">📥</span>
                                Import Data Siswa
                            </Button>
                            <Button variant="outline" className="w-full justify-start h-12">
                                <span className="text-xl mr-3">👨‍🏫</span>
                                Kelola Guru
                            </Button>
                        </div>
                    </div>

                    {/* Top Students */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h2 className="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            🏆 Siswa Terbaik
                        </h2>
                        
                        {topSiswa.length > 0 ? (
                            <div className="space-y-3">
                                {topSiswa.slice(0, 5).map((siswa, index) => (
                                    <div key={siswa.id} className="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                        <div className="flex items-center space-x-3">
                                            <div className="text-lg">
                                                {index === 0 ? '🥇' : index === 1 ? '🥈' : index === 2 ? '🥉' : `#${index + 1}`}
                                            </div>
                                            <div className="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-sm">
                                                👤
                                            </div>
                                            <div>
                                                <div className="font-medium text-gray-800 text-sm">
                                                    {siswa.user.name}
                                                </div>
                                                <div className="text-xs text-gray-500">
                                                    {siswa.kelas} • {siswa.nis}
                                                </div>
                                            </div>
                                        </div>
                                        <div className="text-right">
                                            <div className="flex items-center space-x-2 text-xs">
                                                <span className="text-yellow-600">⭐ {siswa.total_bintang}</span>
                                                <span className="text-orange-600">🏅 {siswa.total_badge}</span>
                                            </div>
                                            {siswa.current_level && (
                                                <div 
                                                    className="text-xs font-semibold mt-1"
                                                    style={{ color: siswa.current_level.color }}
                                                >
                                                    {siswa.current_level.icon} {siswa.current_level.nama}
                                                </div>
                                            )}
                                        </div>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <div className="text-center py-8 text-gray-500">
                                <div className="text-4xl mb-2">🏆</div>
                                <p>Belum ada data siswa</p>
                            </div>
                        )}
                    </div>
                </div>

                {/* System Overview */}
                <div className="bg-gradient-to-r from-green-400 to-blue-500 rounded-xl p-6 text-white">
                    <div className="text-center">
                        <h3 className="text-xl font-bold mb-2">
                            🚀 Sistem Go Class Berjalan Optimal
                        </h3>
                        <p className="text-green-100">
                            Platform gamifikasi pembelajaran dengan {stats.total_siswa} siswa aktif dan {stats.total_guru} guru terdaftar.
                        </p>
                    </div>
                </div>
            </div>
        </AppShell>
    );
}