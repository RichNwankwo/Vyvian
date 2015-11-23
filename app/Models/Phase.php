<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Phase extends Model
{
    //
    protected $table = 'phase';
    protected $fillable = ['phase'];

    public function questions()
    {
        return $this->hasMany('App\Model\Question');
    }
    
}
