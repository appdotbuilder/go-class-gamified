<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level>
 */
class LevelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\App\Models\Level>
     */
    protected $model = Level::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->randomElement(['Pemula', 'Berkembang', 'Kompeten', 'Mahir', 'Expert']),
            'min_bintang' => fake()->numberBetween(0, 100),
            'min_badge' => fake()->numberBetween(0, 5),
            'deskripsi' => fake()->sentence(),
            'icon' => fake()->randomElement(['🌱', '🌿', '🌳', '⭐', '🏆']),
            'color' => fake()->hexColor(),
        ];
    }
}