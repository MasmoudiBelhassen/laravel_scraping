<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Typesource extends Model
{
    protected $fillable = [
        'name_source','url'
    ];

    public function source(){
        return $this->hasMany('App\Source');
    }

}
