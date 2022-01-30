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
        // \App\Models\User::factory(10)->create();     //for admin seeder uncomment it and remove 1o from factory()
        \App\Models\Admin::factory()->create();
    }
}
