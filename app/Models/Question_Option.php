<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question_Option extends Model
{
    protected $table = 'question_option';
    protected $fillable = ['question_id', 'answer_text'];

}
