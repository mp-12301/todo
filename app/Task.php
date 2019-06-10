<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'body'];

    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function labels() 
    {
        return $this->belongsToMany('App\Label');
    }
}
