<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFishStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fish_stocks', function (Blueprint $table) {

            $table->foreign('id')->references('stockID')->on('stocks');
            // $table->unsignedBigInteger('id');
            $table->float('fishPrice');
            $table->date('fishPriceDate');
            // $table->foreign('id')->references('stockID')->on('stocks');
            // $table->foreignId('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fish_stocks');
    }
}
