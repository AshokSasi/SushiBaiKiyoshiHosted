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
        Schema::create('tblFish', function (Blueprint $table) {

            $table->increments('id');
            $table->float('fishPrice');
            $table->date('fishPriceDate');
            $table->unsignedInteger('stockId');
            $table->foreign('stockId')->references('stockId')->on('tblStock');
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
        Schema::dropIfExists('tblFish');
    }
}
