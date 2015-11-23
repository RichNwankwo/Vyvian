<?php


namespace app\Vyvian\Phase;


use App\Model\Question;

class QuestionProvider implements  QuestionProviderInterface {


    public function getPhaseQuestions($phase_id)
    {
        return Question::where('phase_id', '=', $phase_id)->orderBy('sequence_number')->get();
    }

    public function getChildQuestions($question_id)
    {
        return Question::where('parent_id', '=', $question_id)->orderBy('sequence_number')->get();
    }


} 