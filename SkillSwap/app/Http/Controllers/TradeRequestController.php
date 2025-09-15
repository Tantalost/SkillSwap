<?php

namespace App\Http\Controllers;

use App\Models\TradeRequest;
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
        $incoming = TradeRequest::where('receiver_id', Auth::id())->get();
        $outgoing = TradeRequest::where('requester_id', Auth::id())->get();

        return view('trades.index', compact('incoming', 'outgoing'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TradeRequest::create([
            'requester_id' => Auth::id(),
            'receiver_id' => $request->receiver_id,
            'offered_card_id' => $request->offered_card_id,
            'requested_card_id' => $request->requested_card_id,
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
        if ($request->action === 'accept') {
            // Card Swap
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
