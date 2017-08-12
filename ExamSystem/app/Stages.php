<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stages extends Model
{
    protected  $table = 'stages';

    protected $fillable = ['name','position_id','stage'];

    public function position()
    {
        return $this->belongsTo(Position::class,'position_id','id');
    }

    public function stageStatus()
    {
        return $this->hasMany(StageStatus::class,'stage_id','id');
    }

    public function examType()
    {
        return $this->hasOne(ExamType::class,'stage_id','id');
    }

    public function examInfo()
    {
        return $this->hasOne(ExamInfo::class,'stage_id','id');
    }

    public function userScore()
    {
        return $this->hasOne(UserScore::class,'stage_id','id');
    }

    public function userAnswer()
    {
        return $this->hasMany(UserAnswer::class,'stage_id','id');
    }

}
