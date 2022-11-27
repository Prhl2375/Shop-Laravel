<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($k = 1; $k<=13; $k++){
            DB::table('products')->insert([
                'name' => 'p-' . $k,
                'price' => rand(20, 2000),
                'display' => 1,
                'picture' => 'p-' . $k . '.png',
                'tags' => '',
                'discount_number' => rand(0, 75)
            ]);
        }

        for ($k = 1; $k<=3; $k++){
            DB::table('banners')->insert([
                'name' => 'bnr-' . $k,
                'display' => 1,
                'img' => 'bnr-' . $k . '.jpg',
                'link' => '#'
            ]);
        }
        for ($k = 4; $k<=5; $k++){
            DB::table('banners')->insert([
                'name' => 'bnr-' . $k,
                'display' => 1,
                'img' => 'bnr-' . $k . '.png',
                'link' => '#'
            ]);
        }
        for ($k = 1; $k<=3; $k++){
            DB::table('ad_imgs')->insert([
                'name' => 'ad-' . $k,
                'display' => 1,
                'img' => 'ad-' . $k . '.jpg',
                'link' => '#'
            ]);
        }
        DB::table('currencies')->insert([
            'name' => 'USD',
            'prefix' => '$',
            'postfix' => '',
            'rate' => 1,
            'updated_at' => Carbon::yesterday()->subYear(),
            'main' => '1'
        ]);
        DB::table('currencies')->insert([
            'name' => 'UAH',
            'prefix' => '',
            'postfix' => '₴',
            'rate' => 1,
            'updated_at' => Carbon::yesterday()->subYear(),
            'main' => '0'
        ]);
        DB::table('currencies')->insert([
            'name' => 'EUR',
            'prefix' => '€',
            'postfix' => '',
            'rate' => 1,
            'updated_at' => Carbon::yesterday()->subYear(),
            'main' => '0'
        ]);
        DB::table('currencies')->insert([
            'name' => 'JPY',
            'prefix' => '¥',
            'postfix' => '',
            'rate' => 1,
            'updated_at' => Carbon::yesterday()->subYear(),
            'main' => '0'
        ]);
        for ($k = 1; $k<=3; $k++){
            DB::table('single_product_imgs')->insert([
                'product_id' => 1,
                'img' => 's_p-1_' . $k . '.png',
            ]);
        }
        for ($k = 2; $k<=13; $k++){
            DB::table('single_product_imgs')->insert([
                'product_id' => $k,
                'img' => 's_p-' . $k . '_1' . '.png',
            ]);
        }
    }
}
