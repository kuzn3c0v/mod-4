<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News_cat extends Model
{
    public function news(){
        return $this->hasMany('App\News');
    }
}
