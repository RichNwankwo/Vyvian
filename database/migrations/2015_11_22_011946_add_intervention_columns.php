<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInterventionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('intervention', function(Blueprint $table){

            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('phase_id')->nullable()->unsigned();

        });

        Schema::table('intervention',function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->index('phase_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('intervention', function(Blueprint $table){

            $table->dropForeign('intervention_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropColumn('phase_id');
        });
    }
}
