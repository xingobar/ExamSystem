<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected  $table = 'answer';


    public function question()
    {
        return $this->belongsTo(Questions::class,'question_id','id');
    }

}
