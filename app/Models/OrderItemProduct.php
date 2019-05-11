<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemProduct extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cart_item_id', 'product_id', 'amount',
    ];
}
