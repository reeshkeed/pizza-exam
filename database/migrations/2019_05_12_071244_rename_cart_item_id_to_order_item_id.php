<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameCartItemIdToOrderItemId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_item_products', function (Blueprint $table) {
            $table->renameColumn('cart_item_id', 'order_item_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_item_products', function (Blueprint $table) {
            $table->renameColumn('order_item_id', 'cart_item_id');
        });
    }
}
