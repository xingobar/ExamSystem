<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class Choice extends Model
{
    protected $table = 'choice';

    public function question()
    {
        return $this->belongsTo(Questions::class,'question_id','id');
    }

    public function userAnswer()
    {
        return $this->hasOne(UserAnswer::class,'choice_id','id');
    }
}
