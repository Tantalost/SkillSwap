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
            'name' => 'Ash Ketchum',
            'email' => 'ash@example.com',
        ]);

        User::factory()->create([
            'id' => 2,
            'name' => 'Misty Waterflower',
            'email' => 'misty@example.com',
        ]);

        User::factory()->create([
            'id' => 3,
            'name' => 'Brock Harrison',
            'email' => 'brock@example.com',
        ]);

        User::factory()->create([
            'id' => 4,
            'name' => 'Gary Oak',
            'email' => 'gary@example.com',
        ]);

        User::factory()->create([
            'id' => 5,
            'name' => 'Tracey Sketchit',
            'email' => 'tracey@example.com',
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

        Post::factory(15)->create();

        $this->call([
            CardSeeder::class,
            UserCardSeeder::class,
        ]);
    }
}
