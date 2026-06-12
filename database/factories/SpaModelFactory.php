<?php

namespace Database\Factories;

use App\Models\SpaModel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<SpaModel>
 */
class SpaModelFactory extends Factory
{
    protected $model = SpaModel::class;

    public function definition(): array
    {
        return [
            'name' => fake()->words(2, true) . ' Spa',
            'width' => fake()->numberBetween(600, 900),
            'height' => fake()->numberBetween(500, 800),
            'corner_radius' => fake()->numberBetween(20, 80),
            'hinge_position' => fake()->randomElement(['Left', 'Right', 'Center', 'Dual']),
            'color' => fake()->hexColor(),
            'description' => fake()->sentence(),
        ];
    }
}
