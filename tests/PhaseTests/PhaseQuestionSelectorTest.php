<?php

use app\Vyvian\Phase\QuestionProvider;
use app\Model\Question;

class PhaseQuestionSelectorTest extends TestCase {

    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
    }

    public function testIf_question_provider_returns_questions()
    {
        //arrange
        $question_selector = new QuestionProvider();
        foreach(range(1,4) as $row)
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

        $phase11 = [
            ['question_text' => 'This is for phase 11', 'phase_id' => 11, 'sequence_number' => 1],
            ['question_text' => 'This is for phase 11', 'phase_id' => 11, 'sequence_number' => 2],
            ['question_text' => 'This is for phase 11', 'phase_id' => 11, 'sequence_number' => 3],
            ['question_text' => 'This is for phase 11', 'phase_id' => 11, 'sequence_number' => 4],
        ];

        Question::insert($phase11);

        $phase_questions = $question_selector->getPhaseQuestions(11);

        $this->assertEquals($phase11, $phase_questions);




        //assert
    }

}
 