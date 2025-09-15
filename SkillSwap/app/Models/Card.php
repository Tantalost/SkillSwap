<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public function userCards()
    {
        return $this->hasMany(UserCard::class);
    }
}
