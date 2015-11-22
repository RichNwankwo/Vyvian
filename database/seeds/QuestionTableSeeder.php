<?php

use Illuminate\Database\Seeder;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,40) as $row)
        {
            DB::table('question')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'question_text'=> str_random(50),
                'phase_id' => rand(1,10),
                'sequence_number' => rand(1,5),
                'blurb_data' => str_random(200),
                'parent_id' => NULL

            ]);
        }

        foreach(range(1, 20) as $row)
        {
            DB::table('question')->insert([
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'question_text'=> str_random(50),
                'phase_id' => rand(1,10),
                'sequence_number' => rand(1,5),
                'blurb_data' => str_random(200),
                'parent_id' => rand(1, 40)
            ]);
        }

    }
}
