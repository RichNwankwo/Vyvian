<?php

namespace App\Utilities\API\Transformers;
class QuestionOptionTransformer extends Transformer{

    public $format = ['question_id', 'answer_text'];
    public function transform($question_option)
    {
        return [
            'question_id' => $question_option['question_id'],
            'answer_text' => $question_option['answer_text'],
        ];
    }
}