<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUpvotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('upvotes', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('liketable'); // Adds unsigned INTEGER upvoteable_id and STRING upvoteable_type


            /* or
      //https://appdividend.com/2018/05/18/laravel-polymorphic-relationship-tutorial-example/#Step_3_Create_two_controller_files
                      $table->integer('commentable_id')->unsigned();
         $table->string('commentable_type');
             */
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
        Schema::dropIfExists('upvotes');
    }
}
