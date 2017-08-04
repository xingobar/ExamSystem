<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamInfo extends Model
{
    protected  $table = 'exam_info';

    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
    }
}
