<?php

use App\Model\Question;
use App\Model\Question_Option;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Vyvian\Question\QuestionOptionSelector;

class QuestionOptionTest extends TestCase {

    use DatabaseTransactions;


    public function testIf_question_options_are_provided()
    {
        $rand_id = rand(100,200);
        $rand_count = rand(2,10);
        $question = factory(App\Model\Question::class)->create(['id' => $rand_id]);
        $question_options = $question->question_options()->saveMany(factory(App\Model\Question_Option::class, $rand_count)
            ->create()
        );
        $questionOptionSelector = new QuestionOptionSelector();

        $options = $questionOptionSelector->getQuestionOptions($rand_id);

        foreach($options as $option)
        {
            $this->assertEquals($option->question_id, $rand_id);
        }

        $this->assertEquals($rand_count, count($options));


    }



}
 