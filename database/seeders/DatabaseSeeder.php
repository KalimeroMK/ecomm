<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Contact;
use App\Models\Coupon;
use App\Models\Newsletter;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Brand::factory(5)->create();
//        Category::factory(10)->create();
        Contact::factory(10)->create();
        Coupon::factory(2)->create();
        Newsletter::factory(10)->create();
    }
}
