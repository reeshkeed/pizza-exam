<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'kind', 'size', 'price',
    ];

    public function products()
    {
        return $this->hasMany(OrderItemProduct::class);
    }
}
