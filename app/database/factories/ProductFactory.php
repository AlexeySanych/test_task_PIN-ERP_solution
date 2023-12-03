<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = array();
        $count = mt_rand(0, 5);
        for ($i=0; $i < $count; $i++) {
            $data [fake()->word()] = fake()->word();
        }
        $article_char = mt_rand(5, 10);
        $name_char = mt_rand(10, 15);
        return [
            'article' => fake()->unique()->regexify("[a-zA-Z0-9]{{$article_char}}"),
            'name' => fake()->regexify("[A-Z]{1}[a-z]{{$name_char}}"),
            'status' => 'available',
            'data' => $data,
        ];
    }
}
