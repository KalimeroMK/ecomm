<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\OrdersDetail;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class OrderDetailsFactory extends Factory
{
    protected $model = OrdersDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->name,
            'color' => $this->faker->word,
            'size' => $this->faker->word,
            'quantity' => $this->faker->word,
            'singleprice' => $this->faker->word,
            'totalprice' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'order' => $this->faker->word,
            'product' => $this->faker->word,

            'order_id' => function () {
                return Order::factory()->create()->id;
            },
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
        ];
    }
}
