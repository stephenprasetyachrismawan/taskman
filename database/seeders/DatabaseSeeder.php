<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('tasks')->insert([
                'judul' => $faker->catchPhrase(),
                'deskripsi' => $faker->realText(200, 2),
                'user_id' => 1,
                'status' => $faker->randomElement(['completed', 'incomplete'])
            ]);
        }
    }
}
