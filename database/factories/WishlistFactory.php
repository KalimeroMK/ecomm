<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class WishlistFactory extends Factory
{
    protected $model = Wishlist::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'product' => $this->faker->word,
            'user' => $this->faker->word,

            'user_id' => function () {
                return User::factory()->create()->id;
            },
            'product_id' => function () {
                return Product::factory()->create()->id;
            },
        ];
    }
}
