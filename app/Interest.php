<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
  protected $table= 'interests' ;
  protected $fillable = [
      'wording',
  ];

  public function user(){
      return $this->belongsToMany('App\User','interest_user','interest_id','user_id');
  }

  public function article(){
      return $this->belongsToMany('App\Article','interest_article','interest_id','article_id');
  }

    public function source(){
        return $this->hasMany('App\Source');
    }

}
