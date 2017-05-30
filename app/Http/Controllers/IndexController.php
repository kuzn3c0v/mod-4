<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    public function index(){
        

        //$a = News::all(); получить все записи из таблицы news
        $data = News::select(['id', 'title', 'text', 'img_title', 'created_at'])
            ->orderBy('created_at','desc')
            ->take(5)
            ->get();

        // Проверка есть ли такая картинка
        $path = public_path('pictures' . DIRECTORY_SEPARATOR . 'news');
        foreach ($data as $da){
            if ((!file_exists($path . DIRECTORY_SEPARATOR . $da->img_title)) || empty($da->img_title)){
                // Если нет, то присвоим стандартную
                $da->img_title = 'Spare-picture-700x450.jpg';
            }
        }

        return view('index', compact('data')); // Формируем шаблон. Первый аргумент название (.blade.php писать
        // не надо), второй аргумент мы передаем переменные которые будут доступны в представлинии
    }
}
