<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Age extends Model
{
    protected $fillable = [
        'wording',
    ];

   

    public function user(){
        return $this->hasMany('App\User');
    }

    public function article(){
        return $this->belongsToMany('App\Article','age_article','age_id','article_id');
    }

}
