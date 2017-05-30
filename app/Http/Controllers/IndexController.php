<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        

        //$a = News::all(); получить все записи из таблицы news
        //dump($test);
        $data = News::select(['id', 'title', 'text', 'img_url'])->take(5)->get(); // Получить указанные колонки (все записи из таблицы news (первые 5))

        return view('index', compact('data')); // Формируем шаблон. Первый аргумент название (.blade.php писать
        // не надо), второй аргумент мы передаем переменные которые будут доступны в представлинии
    }
}
