<?php

use App\Vyvian\Phase\QuestionProvider;
use App\Model\Question;
use App\Model\Phase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhaseQuestionSelectorTest extends TestCase {

    use DatabaseTransactions;


    public function testIf_question_provider_returns_questions()
    {
        // Get our provider
        $question_selector = new QuestionProvider();

        // create random phase
        $phase_id = rand(1,5);
        // create 1/2 dummy data and 1/2 wanted data
        $phase_wanted = factory(App\Model\Phase::class)->create(['id' => $phase_id]);
        $phase_not_wanted = factory(App\Model\Phase::class)->create(['id' => 777]);
        $number_of_questions = rand(1,10);
        $counter = $number_of_questions;
        while($counter > 0)
        {
            $phase_wanted->questions()->save(factory(App\Model\Question::class)->make());
            $phase_not_wanted->questions()->save(factory(App\Model\Question::class)->make());
            $counter--;
        }

        // call method
        $wanted_questions = $question_selector->getPhaseQuestions($phase_id);

        // assert we get our desired result set
        $this->assertEquals($number_of_questions, count($wanted_questions));
        $this->assertEquals(count($wanted_questions)*2 , count(Question::all()));

    }

    public function testIf_child_questions_are_returned()
    {
        $question_selector = new QuestionProvider();
        $parent_question = factory(App\Model\Question::class)->create(['id' => 116]);
        $dummy_qustions = factory(App\Model\Question::class, 6)->create();
        $child_question = factory(App\Model\Question::class, 5)->create(['parent_id' => 116]);
        $result = $question_selector->getChildQuestions(116);
        $this->assertEquals(count($result), count($child_question));

    }

}
 