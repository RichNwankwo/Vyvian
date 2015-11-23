<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionFlowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('question_flow', function(Blueprint $table){

            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->integer('next_question_id')->unsigned();
            $table->nullableTimestamps();


        });

        Schema::table('question_flow', function(Blueprint $table){

            $table->foreign('question_id')->references('id')->on('question');
            $table->foreign('option_id')->references('id')->on('question_option');
            $table->foreign('next_question_id')->references('id')->on('question');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('question_flow');
    }
}
