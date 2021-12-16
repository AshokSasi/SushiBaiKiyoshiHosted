<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblDiscounts', function (Blueprint $table) {
            $table->increments('discountId');
            $table->unsignedInteger('menuItemId');
            $table->foreign('menuItemId')->references('menuItemId')->on('tblMenuItem');
            $table->integer('discountPercent');
            $table->date('discountStartDate');
            $table->date('discountEndDate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discounts');
    }
}
