<?php

namespace Database\Factories;

use App\Models\SiswaData;
use App\Models\User;
use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SiswaData>
 */
class SiswaDataFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\SiswaData>
     */
    protected $model = SiswaData::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'nis' => '2024' . str_pad((string)fake()->unique()->numberBetween(1, 999), 3, '0', STR_PAD_LEFT),
            'kelas' => fake()->randomElement(['X-A', 'X-B', 'X-C', 'XI-A', 'XI-B', 'XI-C', 'XII-A', 'XII-B', 'XII-C']),
            'total_bintang' => fake()->numberBetween(0, 100),
            'total_badge' => fake()->numberBetween(0, 10),
            'current_level_id' => null,
        ];
    }
}