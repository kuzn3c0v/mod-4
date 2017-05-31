<?php

namespace App\Http\Controllers;

use App\News;
use App\News_cat;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function newsByCat($cat){

        $catId = News_cat::select('id', 'categories')
            ->where('desc', $cat)
            ->first();


        $news = News_cat::find($catId->id)
            ->news()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('cat-news', compact('news', 'catId'));

    }

    public function oneNews($id){

        $data = News::select('id', 'title', 'text','news_cat_id', 'img_title', 'created_at')
            ->where('id', $id)
            ->first();

        $cat = $data->news_cat;

        return view('one-news', compact('data', 'cat'));
    }
}
