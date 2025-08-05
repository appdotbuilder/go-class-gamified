import React from 'react';
import { Head, router } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';

interface LeaderboardEntry {
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
    leaderboard: LeaderboardEntry[];
    availableClasses: string[];
    selectedClass?: string;
    [key: string]: unknown;
}

export default function Leaderboard({ leaderboard, availableClasses, selectedClass }: Props) {
    const handleClassFilter = (kelas: string | null) => {
        router.get('/leaderboard', kelas ? { kelas } : {}, {
            preserveState: true,
            preserveScroll: true
        });
    };

    const getRankIcon = (index: number) => {
        switch (index) {
            case 0: return '🥇';
            case 1: return '🥈';
            case 2: return '🥉';
            default: return `#${index + 1}`;
        }
    };

    return (
        <AppShell>
            <Head title="Leaderboard - Go Class" />
            
            <div className="space-y-6">
                {/* Header */}
                <div className="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl p-8 text-white">
                    <div className="text-center">
                        <h1 className="text-3xl font-bold mb-2 flex items-center justify-center">
                            🏆 Leaderboard Go Class
                        </h1>
                        <p className="text-orange-100 text-lg">
                            Lihat siswa terbaik berdasarkan bintang dan badge yang dikumpulkan
                        </p>
                    </div>
                </div>

                {/* Filter Section */}
                <div className="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <div className="flex flex-wrap items-center gap-4">
                        <span className="font-medium text-gray-700">📊 Filter berdasarkan kelas:</span>
                        
                        <Button
                            onClick={() => handleClassFilter(null)}
                            variant={!selectedClass ? "default" : "outline"}
                            className={!selectedClass ? "bg-blue-600 text-white" : ""}
                        >
                            🌍 Semua Kelas
                        </Button>
                        
                        {availableClasses.map((kelas) => (
                            <Button
                                key={kelas}
                                onClick={() => handleClassFilter(kelas)}
                                variant={selectedClass === kelas ? "default" : "outline"}
                                className={selectedClass === kelas ? "bg-blue-600 text-white" : ""}
                            >
                                📚 {kelas}
                            </Button>
                        ))}
                    </div>
                </div>

                {/* Leaderboard */}
                <div className="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    {leaderboard.length > 0 ? (
                        <>
                            {/* Top 3 Podium */}
                            {leaderboard.length >= 3 && (
                                <div className="bg-gradient-to-r from-yellow-50 to-orange-50 p-8">
                                    <div className="grid md:grid-cols-3 gap-6 max-w-4xl mx-auto">
                                        {/* 2nd Place */}
                                        <div className="text-center order-1 md:order-1">
                                            <div className="bg-gray-200 rounded-2xl p-6 transform md:-translate-y-4">
                                                <div className="text-4xl mb-2">🥈</div>
                                                <div className="w-16 h-16 bg-gray-300 rounded-full mx-auto mb-3 flex items-center justify-center text-2xl">
                                                    👤
                                                </div>
                                                <h3 className="font-bold text-lg mb-1">
                                                    {leaderboard[1].user.name}
                                                </h3>
                                                <p className="text-sm text-gray-600 mb-2">
                                                    {leaderboard[1].kelas}
                                                </p>
                                                <div className="flex justify-center space-x-4 text-sm">
                                                    <span className="flex items-center">
                                                        ⭐ {leaderboard[1].total_bintang}
                                                    </span>
                                                    <span className="flex items-center">
                                                        🏅 {leaderboard[1].total_badge}
                                                    </span>
                                                </div>
                                                {leaderboard[1].current_level && (
                                                    <div className="mt-2">
                                                        <span 
                                                            className="text-sm font-semibold"
                                                            style={{ color: leaderboard[1].current_level.color }}
                                                        >
                                                            {leaderboard[1].current_level.icon} {leaderboard[1].current_level.nama}
                                                        </span>
                                                    </div>
                                                )}
                                            </div>
                                        </div>

                                        {/* 1st Place */}
                                        <div className="text-center order-2 md:order-2">
                                            <div className="bg-yellow-100 rounded-2xl p-6 transform md:-translate-y-8">
                                                <div className="text-5xl mb-2">🥇</div>
                                                <div className="w-20 h-20 bg-yellow-300 rounded-full mx-auto mb-3 flex items-center justify-center text-3xl">
                                                    👤
                                                </div>
                                                <h3 className="font-bold text-xl mb-1">
                                                    {leaderboard[0].user.name}
                                                </h3>
                                                <p className="text-sm text-gray-600 mb-2">
                                                    {leaderboard[0].kelas}
                                                </p>
                                                <div className="flex justify-center space-x-4 text-sm">
                                                    <span className="flex items-center">
                                                        ⭐ {leaderboard[0].total_bintang}
                                                    </span>
                                                    <span className="flex items-center">
                                                        🏅 {leaderboard[0].total_badge}
                                                    </span>
                                                </div>
                                                {leaderboard[0].current_level && (
                                                    <div className="mt-2">
                                                        <span 
                                                            className="text-sm font-semibold"
                                                            style={{ color: leaderboard[0].current_level.color }}
                                                        >
                                                            {leaderboard[0].current_level.icon} {leaderboard[0].current_level.nama}
                                                        </span>
                                                    </div>
                                                )}
                                            </div>
                                        </div>

                                        {/* 3rd Place */}
                                        <div className="text-center order-3 md:order-3">
                                            <div className="bg-orange-100 rounded-2xl p-6 transform md:translate-y-0">
                                                <div className="text-4xl mb-2">🥉</div>
                                                <div className="w-16 h-16 bg-orange-300 rounded-full mx-auto mb-3 flex items-center justify-center text-2xl">
                                                    👤
                                                </div>
                                                <h3 className="font-bold text-lg mb-1">
                                                    {leaderboard[2].user.name}
                                                </h3>
                                                <p className="text-sm text-gray-600 mb-2">
                                                    {leaderboard[2].kelas}
                                                </p>
                                                <div className="flex justify-center space-x-4 text-sm">
                                                    <span className="flex items-center">
                                                        ⭐ {leaderboard[2].total_bintang}
                                                    </span>
                                                    <span className="flex items-center">
                                                        🏅 {leaderboard[2].total_badge}
                                                    </span>
                                                </div>
                                                {leaderboard[2].current_level && (
                                                    <div className="mt-2">
                                                        <span 
                                                            className="text-sm font-semibold"
                                                            style={{ color: leaderboard[2].current_level.color }}
                                                        >
                                                            {leaderboard[2].current_level.icon} {leaderboard[2].current_level.nama}
                                                        </span>
                                                    </div>
                                                )}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            )}

                            {/* Full Leaderboard Table */}
                            <div className="p-6">
                                <h2 className="text-xl font-semibold text-gray-800 mb-4">
                                    📋 Peringkat Lengkap
                                </h2>
                                
                                <div className="overflow-x-auto">
                                    <table className="w-full">
                                        <thead>
                                            <tr className="border-b border-gray-200">
                                                <th className="text-left py-3 px-4 font-semibold text-gray-700">Peringkat</th>
                                                <th className="text-left py-3 px-4 font-semibold text-gray-700">Nama</th>
                                                <th className="text-left py-3 px-4 font-semibold text-gray-700">Kelas</th>
                                                <th className="text-left py-3 px-4 font-semibold text-gray-700">Level</th>
                                                <th className="text-center py-3 px-4 font-semibold text-gray-700">Bintang</th>
                                                <th className="text-center py-3 px-4 font-semibold text-gray-700">Badge</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {leaderboard.map((entry, index) => (
                                                <tr key={entry.id} className="border-b border-gray-100 hover:bg-gray-50">
                                                    <td className="py-4 px-4">
                                                        <div className="flex items-center">
                                                            <span className="text-2xl mr-2">
                                                                {getRankIcon(index)}
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td className="py-4 px-4">
                                                        <div className="flex items-center">
                                                            <div className="w-10 h-10 bg-gray-200 rounded-full mr-3 flex items-center justify-center">
                                                                👤
                                                            </div>
                                                            <div>
                                                                <div className="font-medium text-gray-800">
                                                                    {entry.user.name}
                                                                </div>
                                                                <div className="text-sm text-gray-500">
                                                                    NIS: {entry.nis}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td className="py-4 px-4">
                                                        <span className="bg-blue-100 text-blue-800 text-sm px-2 py-1 rounded-full">
                                                            {entry.kelas}
                                                        </span>
                                                    </td>
                                                    <td className="py-4 px-4">
                                                        {entry.current_level ? (
                                                            <span 
                                                                className="font-semibold text-sm"
                                                                style={{ color: entry.current_level.color }}
                                                            >
                                                                {entry.current_level.icon} {entry.current_level.nama}
                                                            </span>
                                                        ) : (
                                                            <span className="text-gray-400 text-sm">-</span>
                                                        )}
                                                    </td>
                                                    <td className="py-4 px-4 text-center">
                                                        <span className="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                                            ⭐ {entry.total_bintang}
                                                        </span>
                                                    </td>
                                                    <td className="py-4 px-4 text-center">
                                                        <span className="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">
                                                            🏅 {entry.total_badge}
                                                        </span>
                                                    </td>
                                                </tr>
                                            ))}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </>
                    ) : (
                        <div className="text-center py-16">
                            <div className="text-6xl mb-4">🏆</div>
                            <h3 className="text-xl font-semibold text-gray-800 mb-2">
                                Belum Ada Data Leaderboard
                            </h3>
                            <p className="text-gray-600">
                                {selectedClass 
                                    ? `Belum ada siswa di kelas ${selectedClass} yang memiliki poin.`
                                    : 'Belum ada siswa yang memiliki poin.'
                                }
                            </p>
                        </div>
                    )}
                </div>

                {/* Motivational Footer */}
                <div className="bg-gradient-to-r from-green-400 to-blue-500 rounded-xl p-6 text-white text-center">
                    <h3 className="text-xl font-bold mb-2">
                        💪 Semangat Belajar!
                    </h3>
                    <p className="text-green-100">
                        Ikuti aktivitas, kumpulkan bintang dan badge, naik level untuk masuk leaderboard!
                    </p>
                </div>
            </div>
        </AppShell>
    );
}