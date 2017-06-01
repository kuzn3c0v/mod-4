<?php

namespace App\Http\Controllers;

use App\News;
use App\News_cat;
use App\Tag;
use App\Traits\newsPicExist;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    use newsPicExist;

    public function newsByCat($cat){

        $section = News_cat::select('id', 'categories')
            ->where('desc', $cat)
            ->first();


        $news = News_cat::find($section->id)
            ->news()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $this->newsPicExist($news);

        return view('news-list', compact('news', 'section'));

    }

    public function oneNews($id){

        $data = News::select('id', 'title', 'text','news_cat_id', 'img_title', 'created_at')
            ->where('id', $id)
            ->first();

        $this->newsPicExist($data);

        $cat = $data->news_cat;

        $tag = $data->news_tag()->get();

        return view('one-news', compact('data', 'cat', 'tag'));
    }

    public function newsByTag($id){

        $section = Tag::find($id);

        $news = $section->tag_news()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('news-list', compact('news', 'section'));
    }
}
