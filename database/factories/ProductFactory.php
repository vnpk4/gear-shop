<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
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
        $name = fake()->words(3, true);
        return [
            'category_id' => Category::inRandomOrder()->first() ?? Category::factory(),
        'brand_id'    => Brand::inRandomOrder()->first() ?? Brand::factory(),
        'name'        => $name,
        'slug'        => str($name)->slug(),
        'description'=> fake()->paragraph(2),
        'price'       => fake()->randomFloat(2, 200000, 4000000), 
        'stock'       => fake()->numberBetween(10, 50),
        'created_by'  => null,
        'updated_by'  => null,
        ];
    }
}
