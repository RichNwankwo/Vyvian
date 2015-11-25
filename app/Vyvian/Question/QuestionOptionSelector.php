<?php


namespace App\Vyvian\Question;
use App\Model\Question;
use App\Model\Question_Option;


class QuestionOptionSelector implements QuestionOptionSelectorInterface {

    public function getQuestionOptions($question_id)
    {
        return (Question_Option::where('question_id', '=', $question_id)->get());
    }

}