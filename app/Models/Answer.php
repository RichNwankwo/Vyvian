<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = 'answer';
    protected $fillable = ['user_id', 'question_id', 'answer'];
}
