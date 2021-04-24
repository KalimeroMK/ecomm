<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShippingFactory extends Factory
{
    protected $model = Shipping::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'ship_name' => $this->faker->name,
            'ship_phone' => $this->faker->phoneNumber,
            'ship_email' => $this->faker->unique()->safeEmail,
            'ship_address' => $this->faker->address,
            'ship_city' => $this->faker->city,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'order' => $this->faker->word,

            'order_id' => function () {
                return Order::factory()->create()->id;
            },
        ];
    }
}
