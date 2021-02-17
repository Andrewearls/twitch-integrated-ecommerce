<?php

namespace Database\Factories;

use App\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->streetAddress(),
            'address_two' => $this->faker->streetAddress(),
            'country' => 'United States',
            'state' => $this->faker->state(),
            'zip' => $this->faker->postcode(),
        ];
    }
}
