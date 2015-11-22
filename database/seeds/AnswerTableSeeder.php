<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,100) as $row)
        {
            DB::table('answer')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'user_id' => rand(1,100),
                'question_id' => rand(1,60),
                'answer' => str_random(40),
            ]);

        }

    }
}
