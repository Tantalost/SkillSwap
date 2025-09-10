<?php

namespace Database\Seeders;

use App\Models\Catergories;
use App\Models\Post;
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
        User::factory()->create([
             'id' => 1,
             'name' => 'Test User',
             'email' => 'test@example.com',
        ]);
        
        $catergories = [
            'Fire',
            'Water',
            'Grass',
            'Electric',
            'Psychic',
            'Ice',
            'Dragon',
            'Dark',
        ];

        foreach ($catergories as $catergory) {
            \App\Models\Catergories::create([
                'name' => $catergory,
            ]);
        }

        Post::factory(10)->create();
    }
}
