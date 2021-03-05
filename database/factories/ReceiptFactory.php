<?php

namespace Database\Factories;

use App\Receipt;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\User;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;
use App\ReceiptStatus;

class ReceiptFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Receipt::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'cart_content' => 'change this to Cart::factory()',
            'total' => '1000',
            'transaction_completed' => $this->faker->boolean,
            'payment' => 'FakePaymentMethod',
            'status' => ReceiptStatus::PAYED,
        ];
    }
}
