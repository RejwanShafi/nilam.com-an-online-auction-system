<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\Category;
use Illuminate\Http\Request;


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

        return view('auction.show', compact('auctionItem', 'recentItems'));
    }
}
