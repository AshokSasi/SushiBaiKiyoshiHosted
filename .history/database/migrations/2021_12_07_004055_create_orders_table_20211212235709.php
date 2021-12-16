<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblOrder', function (Blueprint $table) {
            $table->increments('orderId');
            $table->unsignedInteger('userId');
            $table->text('orderStatus');
            $table->float('orderTotal');
            $table->timestamps('orderDateTime');
            $table->foreign('userId')->references('userId')->on('tblUser');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
