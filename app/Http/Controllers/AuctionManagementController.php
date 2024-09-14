<?php


namespace App\Http\Controllers;

use App\Models\AuctionItem;
use Illuminate\Http\Request;

class AuctionManagementController extends Controller
{
    //
    
    public function index()
    {
        // Fetch auction items with seller details
        $auctionItems = AuctionItem::where('status', 3)->with('seller')->get();

        return view('admin.auc-approve', compact('auctionItems'));
    }
    public function delete($id)
    {
        $auctionItem = AuctionItem::find($id);

        if ($auctionItem) {
            $auctionItem->delete(); // Delete the auction item
            return redirect()->back()->with('success', 'Auction item deleted successfully!');
        }

        return redirect()->back()->with('error', 'Auction item not found!');
    }

    // Function to approve an auction item
    public function approve($id)
    {
        $auctionItem = AuctionItem::find($id);

        if ($auctionItem) {
            $auctionItem->status = 2; // Set status to 2 (Approved)
            $auctionItem->save();     // Save the update
            return redirect()->back()->with('success', 'Auction item approved successfully!');
        }

        return redirect()->back()->with('error', 'Auction item not found!');
    }
}
