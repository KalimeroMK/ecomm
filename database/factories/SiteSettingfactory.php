<?php

namespace Database\Factories;

use App\Models\Sitesetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class SiteSettingfactory extends Factory
{
    protected $model = Sitesetting::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'phone_one' => $this->faker->phoneNumber,
            'phone_two' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'company_name' => $this->faker->name,
            'company_address' => $this->faker->address,
            'facebook' => $this->faker->word,
            'youtube' => $this->faker->word,
            'instagram' => $this->faker->word,
            'twitter' => $this->faker->word,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
