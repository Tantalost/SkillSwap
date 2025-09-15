<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Card;
use App\Models\UserCard;

class UserCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $cards = Card::all();

        foreach ($users as $user) {
            // Give each user 3 random cards
            $randomCards = $cards->random(3);

            foreach ($randomCards as $card) {
                UserCard::create([
                    'user_id' => $user->id,
                    'card_id' => $card->id,
                ]);
            }
        }
    }
}
