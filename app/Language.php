<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'wording',
    ];

    public function user(){
        return $this->belongsToMany('App\User','Language_user','language_id','user_id');
    }
    public function article(){
        return $this->belongsToMany('App\Article','language_article','language_id','article_id');
    }


    public function source(){
        return $this->hasMany('App\Source');
    }

}
