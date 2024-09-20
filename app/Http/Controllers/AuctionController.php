<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\BidRecord;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuctionController extends Controller
{
    public function getallitem()
    {
        $auctionItems = AuctionItem::where('status', 2)
            ->with(['categories', 'images' => function ($query) {
                $query->take(1); // Only fetch the first image for each auction item
            }])
            ->paginate(9); // 9 items per page (3 rows x 3 columns)

        return view('all_items', compact('auctionItems'));
    }

    public function dashboard()
    {
        // Fetch only the 3 most recent auction items
        $categories = Category::all();

        $auctionItems = AuctionItem::where('status', 2)
            ->orderBy('created_at', 'desc') // Order by creation date
            ->with(['categories', 'images'])
            ->take(3) // Limit to 3 items
            ->get();

        return view('dashboard', compact('categories', 'auctionItems'));
    }

    public function show($id)
    {
        $auctionItem = AuctionItem::with('images', 'categories', 'seller')->findOrFail($id);
        $recentItems = AuctionItem::latest()->take(5)->get(); // Fetch 5 most recent items

        // Calculate remaining time
        $currentDate = now();
        $endDate = \Carbon\Carbon::parse($auctionItem->end_time);
        $timeLeft = $endDate->diff($currentDate);

        // Get the highest bid
        $highestBid = $auctionItem->getHighestBidAttribute();

        // Check if the current user is the highest bidder
        $isHighestBidder = $auctionItem->isHighestBidder();

        return view('auction.show', compact('auctionItem', 'recentItems', 'timeLeft', 'highestBid', 'isHighestBidder'));
    }

    public function placeBid(Request $request)
{
    $request->validate([
        'bid_amount' => 'required|numeric|min:0',
    ]);

    $auctionItem = AuctionItem::find($request->auction_item_id);

    // Check if auction has ended
    if ($auctionItem->isAuctionEnded()) {
        return redirect()->back()->with('error', 'The auction has already ended. You cannot place a bid.');
    }

    // Check if bid amount is less than starting price
    if ($request->bid_amount < $auctionItem->starting_price) {
        return redirect()->back()->with('error', 'Bid amount must be higher than the starting price.');
    }

    // Check if bid amount is less than or equal to the current highest bid
    $highestBid = $auctionItem->bidRecords()->max('amount');
    if ($highestBid && $request->bid_amount <= $highestBid) {
        return redirect()->back()->with('error', 'Bid amount must be higher than the current highest bid.');
    }

    // Save the bid in bid_records
    BidRecord::create([
        'auction_id' => $auctionItem->id,
        'customer_id' => Auth::id(),
        'amount' => $request->bid_amount,
    ]);

    // Update current bid in auction_items
    $auctionItem->current_bid = $request->bid_amount;
    $auctionItem->save();

    return redirect()->back()->with('success', 'Bid placed successfully!');
}
    
}
