<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Bid;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Show the list of auction items
    public function index()
    {
        $items = Item::where('auction_end_time', '>', now())->get();
        return view('items.index', compact('items'));
    }

    // Show a specific item's detail
    public function show($id)
    {
        $item = Item::with('bids')->findOrFail($id);
        return view('items.show', compact('item'));
    }

    // Handle the bidding process
    public function placeBid(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $request->validate([
            'bid_amount' => 'required|numeric|min:' . max($item->current_price ?? $item->starting_price + 1, $item->starting_price + 1),
        ]);
        
        Bid::create([
            'item_id' => $id,
            'user_id' => auth()->id(),
            'bid_amount' => $request->bid_amount,
        ]);

        $item->current_price = $request->bid_amount;
        $item->save();

        return back()->with('success', 'Bid placed successfully');
    }
}
?>