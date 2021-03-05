<?php

namespace Database\Factories;

use App\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'store_id' => 1,
            'name' => $this->faker->words($nb = 2, $asText = True),
            'price' => $this->faker->numberBetween($min = 100, $max = 100000),
            'description' => $this->faker->paragraph($nb_sentences = 1),
            'options' => null,
        ];
    }
}
