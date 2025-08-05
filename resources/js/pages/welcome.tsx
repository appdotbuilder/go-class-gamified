import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';

interface Props {
    auth: {
        user: {
            id: number;
            name: string;
            email: string;
            role: string;
        } | null;
    };
    [key: string]: unknown;
}

export default function Welcome({ auth }: Props) {
    return (
        <>
            <Head title="Go Class - Platform Edukasi Gamifikasi" />
            
            <div className="min-h-screen bg-gradient-to-br from-blue-50 via-white to-green-50">
                {/* Navigation */}
                <nav className="bg-white/80 backdrop-blur-sm border-b border-gray-200 sticky top-0 z-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between h-16">
                            <div className="flex items-center">
                                <div className="flex-shrink-0 flex items-center">
                                    <span className="text-2xl font-bold text-blue-600">📚 Go Class</span>
                                </div>
                            </div>
                            <div className="flex items-center space-x-4">
                                {auth.user ? (
                                    <Link href="/dashboard">
                                        <Button className="bg-blue-600 hover:bg-blue-700 text-white">
                                            Dashboard
                                        </Button>
                                    </Link>
                                ) : (
                                    <div className="flex items-center space-x-2">
                                        <Link href="/login">
                                            <Button variant="outline" className="border-blue-600 text-blue-600 hover:bg-blue-50">
                                                Masuk
                                            </Button>
                                        </Link>
                                        <Link href="/register">
                                            <Button className="bg-blue-600 hover:bg-blue-700 text-white">
                                                Daftar
                                            </Button>
                                        </Link>
                                    </div>
                                )}
                            </div>
                        </div>
                    </div>
                </nav>

                {/* Hero Section */}
                <div className="relative overflow-hidden">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
                        <div className="text-center">
                            <h1 className="text-4xl sm:text-6xl font-bold text-gray-900 mb-6">
                                🎮 <span className="text-blue-600">Go Class</span>
                                <br />
                                <span className="text-green-600">Platform Edukasi Gamifikasi</span>
                            </h1>
                            <p className="text-xl text-gray-600 mb-12 max-w-3xl mx-auto">
                                Transformasi pembelajaran dengan sistem gamifikasi yang menyenangkan! 
                                Dapatkan bintang ⭐, raih badge 🏆, dan naik level sambil belajar.
                            </p>
                            
                            {!auth.user && (
                                <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                    <Link href="/login">
                                        <Button size="lg" className="bg-blue-600 hover:bg-blue-700 text-white text-lg px-8 py-4">
                                            🚀 Mulai Belajar Sekarang
                                        </Button>
                                    </Link>
                                    <Link href="/register">
                                        <Button size="lg" variant="outline" className="border-green-600 text-green-600 hover:bg-green-50 text-lg px-8 py-4">
                                            📝 Daftar Gratis
                                        </Button>
                                    </Link>
                                </div>
                            )}
                        </div>
                    </div>
                </div>

                {/* Features Section */}
                <div className="py-24 bg-white">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-16">
                            <h2 className="text-3xl font-bold text-gray-900 mb-4">
                                ✨ Fitur Utama Go Class
                            </h2>
                            <p className="text-lg text-gray-600">
                                Platform pembelajaran yang memotivasi siswa dengan sistem reward yang menarik
                            </p>
                        </div>

                        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                            <div className="text-center p-8 rounded-2xl bg-blue-50 border border-blue-100">
                                <div className="text-4xl mb-4">🌟</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Sistem Bintang
                                </h3>
                                <p className="text-gray-600">
                                    Dapatkan bintang untuk setiap aktivitas yang diselesaikan. 
                                    Kumpulkan bintang untuk naik level!
                                </p>
                            </div>

                            <div className="text-center p-8 rounded-2xl bg-green-50 border border-green-100">
                                <div className="text-4xl mb-4">🏅</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Badge Prestasi
                                </h3>
                                <p className="text-gray-600">
                                    Raih berbagai badge untuk pencapaian khusus seperti 
                                    kehadiran, tugas tepat waktu, dan perilaku terpuji.
                                </p>
                            </div>

                            <div className="text-center p-8 rounded-2xl bg-purple-50 border border-purple-100">
                                <div className="text-4xl mb-4">📈</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Level System
                                </h3>
                                <p className="text-gray-600">
                                    Naik level dari Pemula hingga Expert berdasarkan 
                                    total bintang dan badge yang dikumpulkan.
                                </p>
                            </div>

                            <div className="text-center p-8 rounded-2xl bg-yellow-50 border border-yellow-100">
                                <div className="text-4xl mb-4">🏆</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Leaderboard
                                </h3>
                                <p className="text-gray-600">
                                    Lihat peringkat siswa terbaik secara global 
                                    maupun per kelas untuk memotivasi kompetisi sehat.
                                </p>
                            </div>

                            <div className="text-center p-8 rounded-2xl bg-red-50 border border-red-100">
                                <div className="text-4xl mb-4">📊</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Dashboard Interaktif
                                </h3>
                                <p className="text-gray-600">
                                    Monitor progress belajar dengan dashboard yang 
                                    menarik dan mudah dipahami.
                                </p>
                            </div>

                            <div className="text-center p-8 rounded-2xl bg-indigo-50 border border-indigo-100">
                                <div className="text-4xl mb-4">👥</div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Multi Role
                                </h3>
                                <p className="text-gray-600">
                                    Mendukung peran Siswa, Guru, dan Admin dengan 
                                    fitur yang disesuaikan untuk masing-masing.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* How It Works Section */}
                <div className="py-24 bg-gray-50">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center mb-16">
                            <h2 className="text-3xl font-bold text-gray-900 mb-4">
                                🚀 Cara Kerja Go Class
                            </h2>
                            <p className="text-lg text-gray-600">
                                Sistem pembelajaran yang sederhana namun efektif
                            </p>
                        </div>

                        <div className="grid md:grid-cols-3 gap-8">
                            <div className="text-center">
                                <div className="bg-blue-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                                    1
                                </div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Ikuti Aktivitas
                                </h3>
                                <p className="text-gray-600">
                                    Siswa mengikuti berbagai aktivitas pembelajaran yang telah disiapkan guru
                                </p>
                            </div>

                            <div className="text-center">
                                <div className="bg-green-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                                    2
                                </div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Dapatkan Reward
                                </h3>
                                <p className="text-gray-600">
                                    Selesaikan aktivitas dan dapatkan bintang serta badge sesuai pencapaian
                                </p>
                            </div>

                            <div className="text-center">
                                <div className="bg-purple-600 text-white rounded-full w-16 h-16 flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                                    3
                                </div>
                                <h3 className="text-xl font-semibold text-gray-900 mb-3">
                                    Naik Level
                                </h3>
                                <p className="text-gray-600">
                                    Kumpulkan bintang dan badge untuk naik level dan bersaing di leaderboard
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                {/* CTA Section */}
                <div className="py-24 bg-gradient-to-r from-blue-600 to-green-600">
                    <div className="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
                        <h2 className="text-3xl font-bold text-white mb-4">
                            🎯 Siap Memulai Perjalanan Belajar yang Menyenangkan?
                        </h2>
                        <p className="text-xl text-blue-100 mb-8">
                            Bergabunglah dengan ribuan siswa yang sudah merasakan pengalaman belajar yang berbeda dengan Go Class!
                        </p>
                        
                        {!auth.user && (
                            <div className="flex flex-col sm:flex-row gap-4 justify-center">
                                <Link href="/register">
                                    <Button size="lg" className="bg-white text-blue-600 hover:bg-gray-100 text-lg px-8 py-4 font-semibold">
                                        📚 Daftar Sebagai Siswa
                                    </Button>
                                </Link>
                                <Link href="/login">
                                    <Button size="lg" variant="outline" className="border-white text-white hover:bg-white hover:text-blue-600 text-lg px-8 py-4 font-semibold">
                                        👨‍🏫 Login Sebagai Guru/Admin
                                    </Button>
                                </Link>
                            </div>
                        )}
                    </div>
                </div>

                {/* Footer */}
                <footer className="bg-gray-900 text-white py-12">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="text-center">
                            <div className="text-2xl font-bold mb-4">📚 Go Class</div>
                            <p className="text-gray-400 mb-4">
                                Platform edukasi gamifikasi untuk pembelajaran yang menyenangkan dan efektif
                            </p>
                            <div className="flex justify-center space-x-6 text-sm text-gray-400">
                                <span>© 2024 Go Class. All rights reserved.</span>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}