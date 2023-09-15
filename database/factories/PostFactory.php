<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array {
        return [
            'user_id'     => fake()->numberBetween( 1, 5 ),
            'category_id' => fake()->numberBetween( 1, 5 ),
            'slug'        => fake()->slug(),
            'title'       => fake()->sentence( 5 ),
            'excerpt'     => fake()->sentence( 15 ),
            'body'        => fake()->sentence( 30 ),
        ];
    }
}
