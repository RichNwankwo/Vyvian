<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnswerColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('answer', function(Blueprint $table){

            $table->integer('user_id')->unsigned();
            $table->integer('question_id')->unsigned();
            $table->string('answer');

        });

        Schema::table('answer', function(Blueprint $table){

           $table->foreign('user_id')->references('id')->on('users');
           $table->foreign('question_id')->references('id')->on('question');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer', function(Blueprint $table){

            $table->dropForeign('answer_user_id_foreign');
            $table->dropForeign('answer_question_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('question_id');
            $table->dropColumn('answer');

        });
    }
}
