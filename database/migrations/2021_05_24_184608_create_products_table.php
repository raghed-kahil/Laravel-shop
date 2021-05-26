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
        Schema::create('products', function (Blueprint $table) {
            $table->foreignId('id')->autoIncrement();
            $table->string('name');
            $table->unsignedSmallInteger('price');
            $table->float('sale',8,8,true);
            $table->unsignedBigInteger('gift')->nullable();
            $table->string('img1');
            $table->string('img2');
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
        Schema::dropIfExists('products');
    }
}
