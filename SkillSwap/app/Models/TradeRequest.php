<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeRequest extends Model
{
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function offeredCard()
    {
        return $this->belongsTo(UserCard::class, 'offered_user_card_id');
    }

    public function desiredCard()
    {
        return $this->belongsTo(Card::class, 'desired_card_id');
    }
}
