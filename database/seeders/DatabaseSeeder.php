<?php

namespace Database\Seeders;

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
        \App\Models\User::factory(1)->has(\App\Models\Store::factory())->create();
        
        $stores = \App\Models\Store::all();

        foreach ($stores as $store) {
            \App\Models\Product::factory()->count(5)->for($store)->create();
        }
    }
}
