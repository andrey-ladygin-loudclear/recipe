<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReceiptsIngredients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_ingredients', function(Blueprint $table)
        {
            $table->increments('id')->unsigned();
            $table->integer('receipt_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();

//            $table->unique(['receipt_id', 'ingredient_id']);

            $table->index('receipt_id');
            $table->foreign('receipt_id')->references('id')->on('receipts')->onDelete('cascade');

            $table->index('ingredient_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}