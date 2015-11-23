<?php

use Illuminate\Database\Seeder;

class QuestionFlowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10) as $row)
        {
            DB::table('question_flow')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'option_id' => rand(1,30),
                'question_id' => rand(1,60),
                'next_question_id' => rand(1,60)
            ]);

        }
    }
}
