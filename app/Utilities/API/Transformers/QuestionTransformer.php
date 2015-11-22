<?php

namespace App\Utilities\API\Transformers;
class QuestionTransformer extends Transformer{

    public $format = ['question_text', 'question_type', 'phase_id', 'sequence_number', 'blurb_data', 'parent_id'];
    public function transform($question)
    {
        return [
            'text' => $question['question_text'],
            'type' => $question['question_type'],
            'phase' => $question['phase_id'],
            'sequence' => $question['sequence_number'],
            'blurb_text' => $question['blurb_data'],
            'parent_id' => $question['parent_id']
        ];
    }
}