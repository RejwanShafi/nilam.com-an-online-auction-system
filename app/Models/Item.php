<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'description', 'starting_price', 'current_price', 'auction_end_time'];

    // Each item has many bids
    public function bids()
{
    return $this->hasMany(Bid::class);
}

}
?>