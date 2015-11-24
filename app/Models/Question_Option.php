<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question_Option extends Model
{
    protected $table = 'question_option';
    protected $fillable = ['question_id', 'answer_text'];


    public function question_flows()
    {
        return $this->belongsToMany('App\Model\Question', 'question_flow','option_id', 'question_id')->withTimestamps();
    }

}
