<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_id' => $this->faker->word,
            'paying_amount' => $this->faker->word,
            'blnc_transection' => $this->faker->word,
            'stripe_order_id' => $this->faker->word,
            'subtotal' => $this->faker->word,
            'shipping' => $this->faker->word,
            'vat' => $this->faker->word,
            'total' => $this->faker->word,
            'status' => $this->faker->word,
            'month' => $this->faker->word,
            'date' => $this->faker->word,
            'year' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'user' => $this->faker->word,
            'orders_details' => $this->faker->word,
            'shippings' => $this->faker->word,

            'user_id' => function () {
                return User::factory()->create()->id;
            },
        ];
    }
}
