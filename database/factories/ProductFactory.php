<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
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
    protected $model =Product::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(1),
            'price' => $this->faker->randomFloat(2, 3, 100),
            'stock' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
