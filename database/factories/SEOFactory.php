<?php

namespace Database\Factories;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SEOFactory extends Factory
{
    protected $model = Seo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'meta_title' => $this->faker->word,
            'meta_author' => $this->faker->word,
            'meta_tag' => $this->faker->word,
            'meta_description' => $this->faker->text,
            'google_analytics' => $this->faker->word,
            'bing_analytics' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
