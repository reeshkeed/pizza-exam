<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'price', 'is_active', 'is_completed',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function getActiveOrder(int $userId)
    {
        $active = static::where('is_active', '=', true)
            ->where('is_completed', '=', false)
            ->where('user_id', '=', $userId)
            ->first();

        if ($active) {
            return $active;
        }

        return static::create([
            'user_id' => $userId,
            'is_active' => true,
            'is_completed' => false,
            'price' => 0
        ]);
    }

    public function addItem($kind, $size, $items)
    {
        $orderItem = $this->items()->create([
          'kind' => $kind,
          'size' => $size,
          'price' => 0
        ]);

        $price = 0;
        $division = 1;

        if ($kind == 'half') $division = 2;

        if ($kind == '4quarters') $division = 4;

        foreach ($items as $productId) {
            $product = Product::find($productId);

            $orderItem->products()->create([
                'product_id' => $product->id,
                'amount' => $product->price
            ]);

            $price += $product->price;
        }

        $orderItem->price = $price;
        $orderItem->save();

        return $orderItem;
    }

}
