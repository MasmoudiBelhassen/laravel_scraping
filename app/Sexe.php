<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sexe extends Model
{
    protected $fillable = [
        'wording',
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

    public function article(){
        return $this->belongsToMany('App\article','sexe_article','sexe_id','article_id');
    }

    
}
