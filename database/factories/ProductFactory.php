<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            "name" => $this->faker->word(),
            "short_title" => $this->faker->word(),
            "price" => $this->faker->randomFloat(2, 10, 1000),
            "sku" => $this->faker->unique()->numerify('SKU-####'),
            'stock' => $this->faker->numberBetween(0, 200),

        ];
    }
}
