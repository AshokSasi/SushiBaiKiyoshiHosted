<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MenuItemsStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_items_stock', function (Blueprint $table) {

            $table->unsignedInteger('menuItemId');
            $table->foreign('menuItemId')->references('menuItemId')->on('tblMenuItem');
            $table->unsignedInteger('stock_stockId');
            $table->foreign('stock_stockId')->references('stockId')->on('stocks');
            $table->primary(['menu_items_id', 'stock_stockId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
