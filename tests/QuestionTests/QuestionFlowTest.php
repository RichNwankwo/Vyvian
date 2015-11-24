<?php

use app\Vyvian\Phase\QuestionProvider;
use App\Model\Question;
use App\Model\Question_Option;
use App\Model\Question_Flow;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Vyvian\Question\QuestionFlowSelector;

class QuestionFlowTest extends TestCase {

    use DatabaseTransactions;

    public function testIf_correct_flow_question_is_provided()
    {
        $questionFlowSelector = new QuestionFlowSelector;
        $question_id = rand(100,200);
        $option_id = rand(300,400);
        $next_question_id = rand(500,600);
        $question = factory(App\Model\Question::class)->create(['id'=> $question_id]);

        $next_question = factory(App\Model\Question::class)->create(['id'=> $next_question_id]);
        $range = 5;
        $question_options = $question->question_options()->saveMany(factory(App\Model\Question_Option::class,5)
            ->create()
            ->each(function($option) use ($question_id) {
                $option->question_flows()->attach($question_id, ['next_question_id'=>rand(10,20)]);
            })
        );
        $selected_option = $question->question_options()->save(factory(App\Model\Question_Option::class)->create(['id'=>$option_id]));
        $selected_option->question_flows()->attach($question_id,['next_question_id' => $next_question_id]);

        $next_question_result = $questionFlowSelector->nextQuestion($question_id, 1, $option_id);
        $this->assertEquals($next_question_result->id, $next_question->id);

    }

    public function testIf_next_sequence_question_is_provided()
    {
        $questionFlowSelector = new QuestionFlowSelector;
        $range = range(1, 10);
        foreach($range as $row)
        {
            $questions[] = factory(App\Model\Question::class)->create(['phase_id' => 1, 'sequence_number' => $row]);
        }

        for($i=0; $i<count($range)-1; $i++)
        {
            $question = $questions[$i];
            $next_question = $questionFlowSelector->nextQuestion($question->id, 1, NULL);
            $this->assertEquals($questions[$i+1]->id, $next_question->id);
        }

    }


}
 