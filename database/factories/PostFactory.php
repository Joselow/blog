<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->unique()->text(10);

        return [
            'name' => $name ,
            'slug' => Str::slug($name),
            'extract' => fake()->text(250),
            'body' => fake()->text(1000),
            'status' => random_int(1, 2),
            'idUser' => User::all()->random()->id,
            'idCategory' => Category::all()->random()->id,
        ];
    }
}
