<?php

namespace Database\Factories;

use App\Models\Department;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->sentence(3),
            'brand' => fake()->sentence(2),
            'product_model' => fake()->sentence(2),
            'price' => fake()->randomFloat(1, 20, 30),
            'tag' => fake()->sentence(1),
            'group_id' => Group::all()->random()->id,
            'department_id' => Department::all()->random()->id,
        ];
    }
}
