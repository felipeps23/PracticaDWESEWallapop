<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();


            $table->bigInteger('iduser1')->unsigned();
            $table->bigInteger('iduser2')->unsigned();
            $table->bigInteger('idproduct')->unsigned();
            $table->text('contacttext')->nullable();

            $table->timestamps();


            $table->foreign('iduser1')->references('id')->on('users');
            $table->foreign('iduser2')->references('id')->on('users');
            $table->foreign('idproduct')->references('id')->on('product');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}