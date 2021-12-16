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
        Schema::create('tblOrderedItems', function (Blueprint $table) {
            $table->increments('orderedItemsId');
            $table->unsignedInteger('menuItemId');
            $table->unsignedInteger('orderId');
            $table->integer('orderedQuantity');
            $table->foreign('menuItemId')->references('menuItemId')->on('tblMenuItem');
            $table->foreign('orderId')->references('orderId')->on('tblOrder');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tblOrderedItems');
    }
}
