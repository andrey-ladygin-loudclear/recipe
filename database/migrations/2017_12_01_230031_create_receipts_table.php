<?php

use App\Helpers\IconHelper;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name');
            $table->string('preview')->default('');
            $table->string('icon')->default(IconHelper::QUESTION_MARK);
            $table->string('author')->default('');
			$table->integer('series_id')->unsigned()->nullable();
			$table->foreign('series_id')->references('id')->on('series')->onDelete('cascade')->onUpdate('cascade');

            $table->text('description');

            $table->tinyInteger('cooking_time')->unsigned()->nullable();
            $table->tinyInteger('portions')->unsigned()->nullable();
            $table->tinyInteger('difficult')->unsigned()->default(10);

            $table->boolean('public')->default('1');

            $table->timestamps();

            //https://github.com/rtconner/laravel-likeable
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
