<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    protected $fillable = ['question_text', 'question_type', 'phase_id', 'sequence_number', 'blurb_data', 'parent_id'];

    public function answer()
    {
        $this->hasManyThrough('App\Model\Answer', 'App\Model\User');
    }

    public function question_options()
    {
        $this->hasMany('App\Model\Question_Option');
    }

    public function question_flows()
    {
        return $this->belongsToMany('App\Model\Question_Option', 'question_flow','question_id', 'option_id');
    }


}
