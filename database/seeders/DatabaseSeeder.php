<?php

namespace Database\Seeders;

// import the class is the same as \App\Models\User::factory(10)->create();
use App\Models\Listing;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // by default, it will create 10 dummy users
        // it comes from UserFactory.php
        //  artisan db:seed - to run this
        // php artisan migrate:refresh --seed - rollback and seed with fresh data
        \App\Models\User::factory(2)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Listing::factory(16)->create();

    }
}
