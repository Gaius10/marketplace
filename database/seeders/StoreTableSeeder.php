<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * Na verdade esta classe semeia os produtos de cada loja
     *
     * @return void
     */
    public function run()
    {
        $stores = \App\Models\Store::all();

        foreach ($stores as $store) {
            \App\Models\Product::factory()->count(5)->for($store)->create();
        }
    }
}
