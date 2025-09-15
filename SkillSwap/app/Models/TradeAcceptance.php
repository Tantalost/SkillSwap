<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TradeAcceptance extends Model
{
    public function tradeRequest()
    {
        return $this->belongsTo(TradeRequest::class);
    }

    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }

    public function responderCard()
    {
        return $this->belongsTo(UserCard::class, 'responder_user_card_id');
    }
}
