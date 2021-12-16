<?php

// Title:      migrations/create_users_table.php
// Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
// Details:    This page generates the about page content for the website which displays the about us 
//             information about the store. This page features an embedded google maps with the store
//             location.

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblUsers', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('userEmail')->unique();
            $table->string('userFirstName');
            $table->string('userLastName');
            $table->string('userPassword');
            $table->string('userPhoneNumber')->unique();
            $table->char('userPosition');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
