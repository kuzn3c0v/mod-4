<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $news = News::select('id', 'title', 'text', 'img_url', 'created_at')
            ->orderBy('created_at','desc') // TODO: Сделать отображение только 20 страниц пагинации
            ->paginate(10);

        return view('all-news', compact('news'));

    }

    public function show($id){
       //$data = News::find($id);  find ищет по первичному ключу

        $data = News::select('id', 'title', 'text', 'img_url', 'created_at')->where('id', $id)->first(); // Выбираем
        // определенные поля, где id = $id, только первую запись first()
        return view('one-news', compact('data'));
    }
}
