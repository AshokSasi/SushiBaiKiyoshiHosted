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

            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('stocks');
            $table->float('fishPrice');
            $table->date('fishPriceDate');
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
