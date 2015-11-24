<?php


namespace App\Vyvian\Question;


use App\Model\Question;
use App\Model\Question_Flow;
use App\Model\Question_Option;

class QuestionFlowSelector implements QuestionFlowSelectorInterface{

    public function nextQuestion($question_id, $phase_id, $option_id = NULL)
    {
        $next_flow_question = $this->nextFlowQuestion($question_id, $option_id);
        $next_sequence_question = $this->nextSequenceQuestion($question_id, $phase_id);

        return ($next_flow_question ? $next_flow_question : $next_sequence_question);
    }

    public function nextFlowQuestion($question_id, $option_id)
    {
        $question_option_flow = Question_Flow::where('option_id', '=', $option_id)->where('question_id', '=', $question_id)->first();
        if($question_option_flow)
        {
            return Question::find($question_option_flow->next_question_id);
        }

        return FALSE;

    }

    public function nextSequenceQuestion($question_id,$phase_id)
    {

        $question = Question::find($question_id);
        $next_sequence_question = Question::where('sequence_number', '>', $question->sequence_number)
            ->where('phase_id', '=', $question->phase_id)
            ->orderBy('sequence_number', 'asc')
            ->first();
        if($next_sequence_question)
        {
            return $next_sequence_question;
        }

        return FALSE;
    }
}