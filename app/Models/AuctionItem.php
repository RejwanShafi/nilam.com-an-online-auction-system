<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    protected $fillable = ['title', 'description', 'starting_price', 'current_bid', 'end_time', 'seller_id', 'status'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'auction_item_category');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
