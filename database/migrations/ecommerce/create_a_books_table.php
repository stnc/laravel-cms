<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateABooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

           // $table->integer('puplishing_house_id');
          //  $table->foreign('puplishing_house_id')->references('id')->on('puplishing_house')->onDelete('cascade');

            $table->text('content')->nullable();
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
        Schema::dropIfExists('a_books');
    }
}
