<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('iduser')->unsigned();
            $table->bigInteger('idcategory')->unsigned();
            $table->string('name', 80);
            $table->text('description')->nullable();
            $table->string('use', 30);
            $table->decimal('price', 6,2);
            $table->date('date');
            $table->string('state',50);
            $table->longtext('photo')->nullable();

            $table->timestamps();

            $table->foreign('iduser')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idcategory')->references('id')->on('category')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}