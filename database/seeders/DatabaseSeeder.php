<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Zoro',
            'last_name' => 'Roronoa',
            'email' => 'zoro@gmail.com',
            'password' => bcrypt('zoro12345'),
        ]);

        $this->call([
            CourseSeeder::class,
            SubjectSeeder::class,
        ]);
    }
}
