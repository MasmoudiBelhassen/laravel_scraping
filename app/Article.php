<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'image',
        'date'
    ];


    public function interet(){
        return $this->belongsToMany('App\Interest','interest_article','article_id','interest_id');
    }


    public function language(){
        return $this->belongsToMany('App\Language','language_article','article_id','language_id');
    }

    public function age(){
        return $this->belongsToMany('App\Age','age_article','article_id','age_id');
    }

    public function sexe(){
        return $this->belongsToMany('App\Sexe','sexe_article','article_id','sexe_id');
    }

    public function source(){
        return $this->belongsTo('App\Source');
    }
}
