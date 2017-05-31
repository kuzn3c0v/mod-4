<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function news_cat(){
        return $this->belongsTo('App' . DIRECTORY_SEPARATOR . 'News_cat');
    }

}
