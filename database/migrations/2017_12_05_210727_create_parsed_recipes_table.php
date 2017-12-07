<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParsedRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parsed_recipes', function (Blueprint $table) {
            $table->increments('id')->unsigned();

            $table->string('name');
            $table->string('link');
            $table->string('preview')->nullable();
            $table->text('description')->nullable();
            $table->boolean('checked')->default(false);
            $table->boolean('approved')->default(false);

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
        Schema::dropIfExists('parsed_recipes');
    }
}
