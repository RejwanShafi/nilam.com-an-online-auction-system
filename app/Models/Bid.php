<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = ['item_id', 'user_id', 'bid_amount'];

    // Each bid belongs to an item
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
