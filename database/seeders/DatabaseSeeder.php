<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $categories = ['Pop', 'Rock', 'Dubstep', 'Jazz'];
        for ($i = 0; $i < 4; $i++) {
            Category::factory()->create([
                'name' => $categories[$i],
            ]);
        }
        for ($i = 1; $i <= 10; $i++) {
            Product::factory()->create([
                'image' => 'dummyProduct' . $i . '.jpg',
            ]);
            Storage::putFileAs('/productImages', 'public/images/seederImages/' . 'dummyProduct' . $i . '.jpg', 'dummyProduct' . $i . '.jpg');
        }
        \App\Models\Cart::factory(10)->create();
        User::factory()->create([
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123123123'),
            'role' => '1',
        ]);
    }
}
