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
            $table->bigIncrements('id');
            $table->string('name',150);
            $table->text('desc')->nullable();
            $table->double('price');
            $table->unsignedBigInteger('by_created')->unsigned();
            $table->foreign('by_created')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->unsignedBigInteger('by_deleted')->unsigned()->nullable();
            $table->foreign('by_deleted')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->softDeletes();
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
