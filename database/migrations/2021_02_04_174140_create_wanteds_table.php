<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWantedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wanteds', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('iduser')->unsigned();
            $table->bigInteger('idproduct')->unsigned();
            
            $table->timestamps();
            
            $table->foreign('iduser')->references('id')->on('users');
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
        Schema::dropIfExists('wanteds');
    }
}
