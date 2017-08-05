<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserScore extends Model
{
    protected $table = 'user_score';

    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
    }

    public function interviewee()
    {
        return $this->belongsTo(Interviewee::class,'interviewee_id','id');
    }
}
