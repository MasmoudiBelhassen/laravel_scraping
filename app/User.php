<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','date_of_birth','email', 'password','age_id','sexe_id'
    ];





        public function sexe(){
        return $this->belongsTo('App\Sexe');
        }

        public function age(){
            return $this->belongsTo('App\Age');
        }

        public function interet(){
            return $this->belongsToMany('App\Interest','interest_user','user_id','interest_id');
        }


        public function language(){
            return $this->belongsToMany('App\Language','language_user','user_id','language_id');
        }



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
