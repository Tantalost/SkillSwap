<?php

namespace App\Http\Controllers;

use App\Models\TradeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserCard;
use Illuminate\Support\Facades\Auth;

class TradeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        // Trades the user has received
        $receivedTrades = $user->tradeRequestsReceived()
            ->with(['offeredCard.card', 'requestedCard.card', 'requester'])
            ->get();

        // Trades the user has sent
        $sentTrades = $user->tradeRequestsSent()
            ->with(['offeredCard.card', 'requestedCard.card', 'receiver'])
            ->get();

        return view('trades.trade-request', [
            'receivedTrades' => $receivedTrades,
            'sentTrades' => $sentTrades,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $offeredCard = UserCard::find($request->offered_card_id);
        $requestedCard = UserCard::find($request->requested_card_id);

        if ($offeredCard->user_id !== Auth::id()) {
            return back()->with('error', 'You can only offer your own cards.');
        }

        TradeRequest::create([
            'requester_id' => Auth::id(),
            'receiver_id' => $requestedCard->user_id,
            'offered_card_id' => $offeredCard->id,
            'requested_card_id' => $requestedCard->id,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Trade request sent!');
    }

    /**
     * Display the specified resource.
     */
    public function show(TradeRequest $tradeRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TradeRequest $tradeRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TradeRequest $tradeRequest)
    {
        if ($tradeRequest->receiver_id !== Auth::id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        if ($request->action === 'accept') {
            $offeredCard = UserCard::find($tradeRequest->offered_card_id);
            $requestedCard = UserCard::find($tradeRequest->requested_card_id);

            $offeredCard->user_id = $tradeRequest->receiver_id;
            $requestedCard->user_id = $tradeRequest->requester_id;

            $offeredCard->save();
            $requestedCard->save();

            $tradeRequest->update(['status' => 'accepted']);
        } else {
            $tradeRequest->update(['status' => 'rejected']);
        }

        return back()->with('success', 'Trade updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TradeRequest $tradeRequest)
    {
        if ($tradeRequest->requester_id === Auth::id()) {
            $tradeRequest->delete();
        }

        return back()->with('success', 'Trade request cancelled!');
    }
}
