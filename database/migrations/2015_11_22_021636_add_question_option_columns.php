<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionOptionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_option', function(Blueprint $table){

            $table->integer('question_id')->unsigned()->nullable();
            $table->string('answer_text')->nullable();

        });

        Schema::table('question_option', function(Blueprint $table){

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
        Schema::table('question_option', function(Blueprint $table){

            $table->dropForeign('question_option_question_id_foreign');
            $table->dropColumn('question_id');
            $table->dropColumn('answer_text');

        });
    }
}
