<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creates table for the answer
        Schema::create('answer', function(Blueprint $table){

            $table->increments('id');
            $table->nullableTimestamps();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drops the table
        Schema::drop('answer');
    }
}
