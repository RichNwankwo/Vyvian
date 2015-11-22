<?php

use Illuminate\Database\Seeder;

class QuestionOptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,60) as $row)
        {
            DB::table('question_option')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'answer_text' => str_random(30),
                'question_id' => rand(1,60)
            ]);

        }

    }
}
