<?php

namespace Database\Factories;

use App\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'encoded_image' => base64_encode(file_get_contents('https://via.placeholder.com/150')),

        ];
    }
}
