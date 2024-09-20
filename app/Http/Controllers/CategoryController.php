<?php

namespace App\Http\Controllers;

use App\Models\AuctionItem;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showByCategory(Request $request)
    {
        $categoryName = $request->query('category');

        // Fetch the category
        $category = Category::where('name', $categoryName)->firstOrFail();

        // Get the auction items related to this category
        $auctionItems = AuctionItem::whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->with('images', 'categories')->get();

        // Pass the auction items and category to the view
        return view('auction.filtered_items', compact('auctionItems', 'category'));
    }
}
