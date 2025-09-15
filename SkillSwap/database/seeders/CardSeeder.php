<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Card;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cards = [
            [
                'name' => 'Giratina',
                'type' => 'Dragon',
                'rarity' => 'Common',
                'hp' => 220,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-SWSH11-186-giratina_v.jpg',
            ],
            [
                'name' => 'Charizard',
                'type' => 'Dark',
                'rarity' => 'Common',
                'hp' => 50,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/sv4-5_en_234_std.jpg',
            ],
            [
                'name' => 'Zekrom',
                'type' => 'Electric',
                'rarity' => 'Common',
                'hp' => 230,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/zsv10-5_en_166_std.jpg',
            ],
            [
                'name' => 'Greninja',
                'type' => 'Fighting',
                'rarity' => 'Common',
                'hp' => 310,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/zsv10-5_en_166_std.jpg',
            ],
            [
                'name' => 'Umbreon',
                'type' => 'Dark',
                'rarity' => 'Uncommon',
                'hp' => 280,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/sv8-5_en_161_std.jpg',
            ],
            [
                'name' => 'Kingambit',
                'type' => 'Dark',
                'rarity' => 'Rare',
                'hp' => 170,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/sv1_en_220.jpg',
            ],
            [
                'name' => 'Mewtwo',
                'type' => 'Psychic',
                'rarity' => 'Legendary',
                'hp' => 120,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/mewtwo-base-set-10.jpg',
            ],
            [
                'name' => 'Gengar',
                'type' => 'Ghost',
                'rarity' => 'Rare',
                'hp' => 110,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/gengar-fossil-5.jpg',
            ],
            [
                'name' => 'Dragonite',
                'type' => 'Dragon',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/dragonite-fossil-4.jpg',
            ],
            [
                'name' => 'Charizard',
                'type' => 'Fire',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/charizard-base-set-4.jpg',
            ],
        ];

        foreach ($cards as $card) {
            Card::create($card);
        }
    }
}