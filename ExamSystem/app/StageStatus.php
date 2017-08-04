<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StageStatus extends Model
{
    protected  $table = 'stage_status';

    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
    }
}
