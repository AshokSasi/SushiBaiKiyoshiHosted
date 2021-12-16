<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_items', function (Blueprint $table) {
            $table->increments('orderedItemsId');
            $table->unsignedInteger('menuItemId');
            $table->unsignedInteger('orderId');
            $table->integer('qunatity');
            $table->foreign('menuItemId')->references('id')->on('menu_items');
            $table->foreign('orderId')->references('orderId')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordered_items');
    }
}
