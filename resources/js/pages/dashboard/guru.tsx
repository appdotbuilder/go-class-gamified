import React from 'react';
import { Head } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';

interface Activity {
    id: number;
    nama: string;
    deskripsi: string;
    tanggal: string;
    bintang_reward: number;
    badge_reward: number;
    status: string;
}

interface Violation {
    id: number;
    tanggal: string;
    catatan?: string;
    siswa: {
        user: {
            name: string;
        };
        kelas: string;
        nis: string;
    };
    pelanggaran_jenis: {
        jenis: string;
        tingkat: string;
        pengurang_bintang: number;
        pengurang_badge: number;
    };
}

interface Props {
    totalSiswa: number;
    recentActivities: Activity[];
    recentViolations: Violation[];
    [key: string]: unknown;
}

export default function GuruDashboard({ totalSiswa, recentActivities, recentViolations }: Props) {
    return (
        <AppShell>
            <Head title="Dashboard Guru - Go Class" />
            
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-gradient-to-r from-green-500 to-blue-500 rounded-2xl p-8 text-white">
                    <div className="flex items-center justify-between">
                        <div>
                            <h1 className="text-3xl font-bold mb-2">
                                👨‍🏫 Dashboard Guru
                            </h1>
                            <p className="text-green-100 text-lg">
                                Kelola aktivitas siswa dan pantau perkembangan pembelajaran
                            </p>
                        </div>
                        <div className="text-6xl">📚</div>
                    </div>
                </div>

                {/* Stats Cards */}
                <div className="grid md:grid-cols-4 gap-6">
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">👥</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-blue-600">
                                    {totalSiswa}
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
                            <div className="text-2xl">📋</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-green-600">
                                    {recentActivities.length}
                                </div>
                                <div className="text-sm text-gray-500">Aktivitas Aktif</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Aktivitas yang sedang berjalan
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">⚠️</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-red-600">
                                    {recentViolations.length}
                                </div>
                                <div className="text-sm text-gray-500">Pelanggaran Terbaru</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Pelanggaran yang tercatat
                        </div>
                    </div>

                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div className="flex items-center justify-between mb-4">
                            <div className="text-2xl">🏆</div>
                            <div className="text-right">
                                <div className="text-2xl font-bold text-purple-600">
                                    -
                                </div>
                                <div className="text-sm text-gray-500">Badge Diberikan</div>
                            </div>
                        </div>
                        <div className="text-sm text-gray-600">
                            Badge yang telah diberikan
                        </div>
                    </div>
                </div>

                {/* Quick Actions */}
                <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h2 className="text-xl font-semibold text-gray-800 mb-4">
                        🎯 Menu Guru
                    </h2>
                    <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <Button className="h-20 flex flex-col items-center justify-center bg-blue-50 text-blue-600 hover:bg-blue-100 border-blue-200">
                            <span className="text-2xl mb-1">⭐</span>
                            <span className="text-sm">Berikan Bintang</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-green-50 text-green-600 hover:bg-green-100 border-green-200">
                            <span className="text-2xl mb-1">🏅</span>
                            <span className="text-sm">Berikan Badge</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-red-50 text-red-600 hover:bg-red-100 border-red-200">
                            <span className="text-2xl mb-1">⚠️</span>
                            <span className="text-sm">Catat Pelanggaran</span>
                        </Button>
                        <Button className="h-20 flex flex-col items-center justify-center bg-purple-50 text-purple-600 hover:bg-purple-100 border-purple-200">
                            <span className="text-2xl mb-1">👥</span>
                            <span className="text-sm">Data Siswa</span>
                        </Button>
                    </div>
                </div>

                {/* Content Grid */}
                <div className="grid lg:grid-cols-2 gap-6">
                    {/* Recent Activities */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h2 className="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            📚 Aktivitas Terbaru
                        </h2>
                        
                        {recentActivities.length > 0 ? (
                            <div className="space-y-4">
                                {recentActivities.map((activity) => (
                                    <div key={activity.id} className="border border-gray-200 rounded-lg p-4">
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
                                        <div className="flex justify-between items-center">
                                            <div className="text-xs text-gray-500">
                                                📅 {new Date(activity.tanggal).toLocaleDateString('id-ID')}
                                            </div>
                                            <span className={`text-xs px-2 py-1 rounded-full ${
                                                activity.status === 'aktif' 
                                                    ? 'bg-green-100 text-green-800' 
                                                    : 'bg-gray-100 text-gray-800'
                                            }`}>
                                                {activity.status}
                                            </span>
                                        </div>
                                    </div>
                                ))}
                            </div>
                        ) : (
                            <div className="text-center py-8 text-gray-500">
                                <div className="text-4xl mb-2">📝</div>
                                <p>Belum ada aktivitas</p>
                            </div>
                        )}
                    </div>

                    {/* Recent Violations */}
                    <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h2 className="text-xl font-semibold text-gray-800 mb-4 flex items-center">
                            ⚠️ Pelanggaran Terbaru
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
                                            <div>👤 {violation.siswa.user.name} ({violation.siswa.kelas})</div>
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
                                <p>Tidak ada pelanggaran terbaru</p>
                            </div>
                        )}
                    </div>
                </div>
            </div>
        </AppShell>
    );
}