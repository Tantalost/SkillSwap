<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TradeRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id',
        'receiver_id',
        'offered_card_id',
        'requested_card_id',
        'status',
    ];

    // Relationships
    public function requester()
    {
        return $this->belongsTo(User::class, 'requester_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function offeredCard()
    {
        return $this->belongsTo(UserCard::class, 'offered_card_id');
    }

    public function requestedCard()
    {
        return $this->belongsTo(UserCard::class, 'requested_card_id');
    }
}
