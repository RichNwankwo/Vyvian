<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddQuestionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question', function(Blueprint $table){

            $table->string('question_text')->nullable();
            $table->string('question_type')->nullable();
            $table->integer('phase_id')->unsigned()->nullable();
            $table->integer('sequence_number')->nullable();
            $table->longText('blurb_data')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();

        });

        Schema::table('question', function(Blueprint $table){

            $table->foreign('phase_id')->references('id')->on('phase');
            $table->index('parent_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question', function(Blueprint $table){

            $table->dropForeign('question_phase_id_foreign');

            $table->removeColumn('question_text');
            $table->removeColumn('question_type');
            $table->removeColumn('phase_id');
            $table->removeColumn('sequence_number');
            $table->removeColumn('blurb_data');
            $table->removeColumn('parent_id');


        });
    }
}
