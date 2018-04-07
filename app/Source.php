<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    protected $fillable = [
      'parent','title','image','date','description','url','href'
    ];

    public function typesource(){
        return $this->belongsTo('App\Typesource');
    }



    public function article(){
        return $this->hasMany('App\Article');
    }

    public function interest(){
        return $this->belongsTo('App\Interest');
    }
    public function language(){
        return $this->belongsTo('App\Language');
    }
}
