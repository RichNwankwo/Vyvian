<?php


namespace app\Vyvian\Phase;


use App\Model\Question;

class QuestionProvider implements  QuestionProviderInterface {


    public function getPhaseQuestions($phase_id)
    {
        return Question::where('phase_id', '=', $phase_id)->orderBy('sequence_number')->get();
    }


} 