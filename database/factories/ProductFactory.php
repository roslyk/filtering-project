<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
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
            //           
            'category_id' => Category::factory(),
             'name' => $this->faker->unique()->word,
             'slug' => $this->faker->unique()->slug,
             'description' => $this->faker->sentence($nbwords = 10),
             'price' => $this->faker->randomFloat(2,1,10),
             'date_added' => $this->faker->date()
        ];
    }
}
