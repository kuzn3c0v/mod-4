<?php

namespace App\Http\Controllers;

use App\News;
use App\News_cat;
use App\Tag;
use App\Traits\newsPicExist;
use App\Comment;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    use newsPicExist;

    public function newsByCat($cat){

        $section = News_cat::where('desc', $cat)
            ->first();


        $news = News_cat::findOrFail($section->id)
            ->news()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        $this->newsPicExist($news);

        return view('news-list', compact('news', 'section'));

    }

    public function oneNews($id){

        $oneNews = News::where('id', $id)
            ->first();

        $this->newsPicExist($oneNews);

        $cat = $oneNews->news_cat;

        $tag = $oneNews->news_tag()->get();

        $comments = $oneNews->comments()->get();

        return view('one-news', compact('oneNews', 'cat', 'tag', 'comments'));
    }

    public function newsByTag($id){

        $section = Tag::findOrFail($id);

        $news = $section->tag_news()
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('news-list', compact('news', 'section'));
    }

    public function viewed(){
        if (isset($_POST['id'])){

            $viewed = News::findOrFail($_POST['id']);

            $viewed->viewed = $viewed->viewed + $_POST['watch_now'];

            $viewed->save();

            return $viewed->viewed;
        }else{
            return false;
        }
    }
}
