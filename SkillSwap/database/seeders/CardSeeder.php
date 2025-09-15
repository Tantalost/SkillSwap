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
                'image_url' => 'https://pkmncards.com/wp-content/uploads/sv6_en_214_std.jpg',
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
                'image_url' => 'https://pkmncards.com/wp-content/uploads/sv3-5_en_150_std.jpg',
            ],
            [
                'name' => 'Gengar',
                'type' => 'Ghost',
                'rarity' => 'Rare',
                'hp' => 110,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-Promo_XY-XY166-m_gengar_ex.jpg',
            ],
            [
                'name' => 'Rayquaza',
                'type' => 'Normal',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-XY7-098-m_rayquaza_ex.jpg',
            ],
            [
                'name' => 'Reshiram',
                'type' => 'Fire',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/rsv10-5_en_166_std.jpg',
            ],
            [
                'name' => 'Urshifu VMAX',
                'type' => 'Fire',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-SWSH9-TG021-rapid_strike_urshifu_vmax.jpg',
            ],
            [
                'name' => 'Necrozma',
                'type' => 'Fire',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-SWSH5-063-necrozma_v.jpg',
            ],
            [
                'name' => 'Gyarados',
                'type' => 'Fire',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-Promo_XY-XY106-gyarados_ex.jpg',
            ],
            [
                'name' => 'Solgaleo',
                'type' => 'Metal',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-SM1-089-solgaleo_gx.jpg',
            ],
            [
                'name' => 'Regidrago',
                'type' => 'Fire',
                'rarity' => 'Legendary',
                'hp' => 150,
                'image_url' => 'https://pkmncards.com/wp-content/uploads/en_US-SWSH12-135-regidrago_v.jpg',
            ],
        ];

        foreach ($cards as $card) {
            Card::create($card);
        }
    }
}