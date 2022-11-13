<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        //     'address' => Str::random(10),
        //     'phone' => Str::random(10),
        // ]);
        // User::create([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10) . '@gmail.com',
        //     'password' => Hash::make('password'),
        //     'address' => Str::random(10),
        //     'phone' => Str::random(10),
        // ]);
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(10)->create();
        \App\Models\Cart::factory(10)->create();
    }
}
