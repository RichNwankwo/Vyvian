<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = ['question_text', 'question_type', 'phase_id', 'sequence_number', 'blurb_data', 'parent_id'];
}
