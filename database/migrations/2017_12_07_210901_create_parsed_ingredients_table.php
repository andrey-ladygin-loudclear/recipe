<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsedIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsed_ingredients', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->integer('parsed_recipe_id')->unsigned();
            $table->foreign('parsed_recipe_id')->references('id')->on('parsed_recipes')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name')->default('');
            $table->string('quantity')->default('');

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
        Schema::dropIfExists('parsed_ingredients');
    }
}