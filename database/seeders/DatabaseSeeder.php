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
        \App\Models\User::factory(10000)->create();
        // $this->call(PostSeeder::class);
        // $this->call(CategorySeeder::class);
    }
}
