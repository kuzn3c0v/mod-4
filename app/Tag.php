<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    public function tag_news(){

        return $this->belongsToMany('App\News', 'tag_news');
    }
}
