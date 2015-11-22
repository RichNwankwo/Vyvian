<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    //
    protected $table = 'intervention';
    protected $fillable = ['user_id', 'phase_id'];
}
