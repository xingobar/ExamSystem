<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
     protected $table = 'position';


     protected $fillable = ['name','location_id'];

     public function stage()
     {
         return $this->hasMany(Stages::class,'position_id','id');
     }

     public function location()
     {
         return $this->belongsTo(Location::class,'location_id','id');
     }
}
