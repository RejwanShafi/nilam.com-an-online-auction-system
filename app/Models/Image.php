<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['auction_item_id', 'url'];

    // Define the relationship to the AuctionItem model
    public function auctionItem()
    {
        return $this->belongsTo(AuctionItem::class, 'auction_item_id');
    }
}
