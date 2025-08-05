<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\SiswaData;
use App\Models\Level;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GoClassTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test welcome page loads successfully.
     */
    public function test_welcome_page_loads(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('welcome')
        );
    }

    /**
     * Test siswa can access dashboard.
     */
    public function test_siswa_can_access_dashboard(): void
    {
        // Create a level first
        $level = Level::create([
            'nama' => 'Pemula',
            'min_bintang' => 0,
            'min_badge' => 0,
            'deskripsi' => 'Level untuk siswa baru',
            'icon' => '🌱',
            'color' => '#10B981',
        ]);

        // Create siswa user
        $user = User::create([
            'name' => 'Test Siswa',
            'username' => '2024001',
            'email' => 'siswa@test.com',
            'password' => bcrypt('password'),
            'role' => 'siswa',
        ]);

        $siswaData = SiswaData::create([
            'user_id' => $user->id,
            'nis' => '2024001',
            'kelas' => 'X-A',
            'total_bintang' => 10,
            'total_badge' => 1,
            'current_level_id' => $level->id,
        ]);

        $response = $this->actingAs($user)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('dashboard/siswa')
            ->has('siswaData')
        );
    }

    /**
     * Test leaderboard loads successfully.
     */
    public function test_leaderboard_loads(): void
    {
        $user = User::factory()->create(['role' => 'siswa']);

        $response = $this->actingAs($user)->get('/leaderboard');
        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('leaderboard')
            ->has('leaderboard')
            ->has('availableClasses')
        );
    }

    /**
     * Test admin can access dashboard.
     */
    public function test_admin_can_access_dashboard(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $response = $this->actingAs($admin)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('dashboard/admin')
            ->has('stats')
        );
    }

    /**
     * Test guru can access dashboard.
     */
    public function test_guru_can_access_dashboard(): void
    {
        $guru = User::create([
            'name' => 'Guru',
            'username' => 'guru',
            'email' => 'guru@test.com',
            'password' => bcrypt('password'),
            'role' => 'guru',
        ]);

        $response = $this->actingAs($guru)->get('/dashboard');
        $response->assertStatus(200);
        $response->assertInertia(fn ($assert) => $assert
            ->component('dashboard/guru')
            ->has('totalSiswa')
        );
    }
}