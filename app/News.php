<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function news_cat(){

        return $this->belongsTo('App\News_cat');
    }

    public function news_tag(){

        return $this->belongsToMany('App\Tag', 'tag_news');
    }

    public function comments(){

        return $this->hasMany('App\Comment', 'news_id', 'id');
    }
}
