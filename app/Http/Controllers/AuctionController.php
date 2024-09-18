<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Http\Request;

// class AuctionController extends Controller
// {
//     //
//     public function shop()
//     {
//         // Fetch auction items with status 2 and eager load related categories and images
//         $auctionItems = AuctionItem::where('status', 2)->with(['categories', 'images'])->get();

//         return view('shop', compact('auctionItems'));
//     }

// }
class AuctionController extends Controller
{
    public function shop()
    {
        $auctionItems = AuctionItem::where('status', 2)
            ->with(['categories', 'images' => function ($query) {
                $query->take(1); // Only fetch the first image for each auction item
            }])
            ->get();

        return view('shop', compact('auctionItems'));
    }
    public function dashboard()
    {
        // Fetch only the 3 most recent auction items
        $auctionItems = AuctionItem::where('status', 2)
            ->orderBy('created_at', 'desc') // Order by creation date
            ->with(['categories', 'images'])
            ->take(3) // Limit to 3 items
            ->get();

        return view('dashboard', compact('auctionItems'));
    }
}
