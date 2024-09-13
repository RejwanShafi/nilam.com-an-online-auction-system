<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuctionItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'starting_price', 'current_bid', 'end_time', 'seller_id'];

    // Define the relationship to the User model
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    // Define the relationship to the Category model
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'auction_item_category');
    }

    // Define the relationship to the Image model
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
