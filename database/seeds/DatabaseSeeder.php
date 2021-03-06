<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
         $this->call(PhaseTableSeeder::class);
         $this->call(InterventionTableSeeder::class);
        $this->call(QuestionTableSeeder::class);
        $this->call(QuestionOptionTableSeeder::class);
        $this->call(AnswerTableSeeder::class);
        $this->call(QuestionFlowSeeder::class);

        Model::reguard();
    }
}
