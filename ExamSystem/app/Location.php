<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected  $table = 'location';

    protected $fillable = ['name'];

    public function position()
    {
        return $this->hasMany(Position::class,'location_id','id');
    }
}
