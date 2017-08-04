<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table = 'questions';

    public function choice()
    {
        return $this->hasMany(Choice::class,'question_id','id');
    }

    public function answer()
    {
        return $this->hasMany(Answer::class,'question_id','id');
    }
}

