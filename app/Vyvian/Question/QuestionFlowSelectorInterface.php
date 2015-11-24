<?php


namespace App\Vyvian\Question;


interface QuestionFlowSelectorInterface {

    public function nextQuestion($question_id, $phase_id, $option_id = NULL);

    public function nextFlowQuestion($question_id, $option_id);

    public function nextSequenceQuestion($question_id, $phase_id);


} 