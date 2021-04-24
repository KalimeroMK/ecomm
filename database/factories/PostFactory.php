<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PostFactory extends Factory
{
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'post_title_en' => $this->faker->word,
            'post_title_in' => $this->faker->word,
            'post_image' => $this->faker->word,
            'details_en' => $this->faker->word,
            'details_in' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'category' => $this->faker->word,

            'category_id' => function () {
                return Category::factory()->create()->id;
            },
        ];
    }
}
