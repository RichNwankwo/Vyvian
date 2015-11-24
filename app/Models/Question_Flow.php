<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question_Flow extends Model
{
    protected $table = 'question_flow';
    protected $fillable = ['question_id', 'option_id', 'next_question_id'];


}
