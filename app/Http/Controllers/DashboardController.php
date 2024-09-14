<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\AuctionItem;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Get all categories
        $auctionItems = AuctionItem::with('images')->get(); // Get all auction items with their images

        return view('dashboard', compact('categories', 'auctionItems'));
    }
}
