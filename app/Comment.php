<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'user_id',
        'news_id',
    ];
    public function find_user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function find_news(){
        return $this->belongsTo('App\News');
    }
}
