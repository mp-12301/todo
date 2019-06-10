<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $fillable = ['title'];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function tasks() 
    {
        return $this->belongsToMany('App\Task');
    }
}
