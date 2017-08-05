<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    protected  $table = 'user_answer';

    public function choice()
    {
        return $this->belongsTo(Choice::class,'choice_id','id');
    }

    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
    }

    public function interviewee()
    {
        return $this->belongsTo(Interviewee::class,'interviewee_id','id');
    }
}
