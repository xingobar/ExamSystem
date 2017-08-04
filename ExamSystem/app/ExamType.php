<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $table = 'exam_type';

    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
    }
}
