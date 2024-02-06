<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AuthorSeeder::class,
            ImageSeeder::class,
            ActorSeeder::class,
            LanguageSeeder::class,
            CountrySeeder::class,
            ActorRelsSeeder::class,
            MovieSeeder::class,
            EmployeeSeeder::class,
        ]); // Call all seeder
    }
}
