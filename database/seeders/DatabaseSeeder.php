<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
        //User::factory(10)->create();
        User::factory()->create([
        'name' => 'John Doe',
        'email' => 'john.doe@email.com',
        'password' => bcrypt('password123'),
        ]);
        $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
    }
}
