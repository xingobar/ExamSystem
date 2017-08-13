<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StageStatus extends Model
{
    protected  $table = 'stage_status';

    protected $fillable = ['name','stage_id'];

    public function stage()
    {
        return $this->belongsTo(Stages::class,'stage_id','id');
    }
}
