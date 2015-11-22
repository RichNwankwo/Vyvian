<?php

namespace App\Utilities\API\Transformers;
class AnswerTransformer extends Transformer{

    public $format = ['user_id', 'question_id', 'answer'];
    public function transform($answer)
    {
//        dd($answer);
        return [
            'user_id' => $answer["user_id"],
            'question_id' => $answer["question_id"],
            'answer' => $answer["answer"]
        ];
    }
}