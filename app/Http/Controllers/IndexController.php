<?php

namespace App\Http\Controllers;

use App\News;
use App\News_cat;
use App\Traits\newsPicExist;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    use newsPicExist;

    public function index(){

        // Новости для карусели
        $carousel = News::latest('created_at')
            ->take(4)
            ->get();

        // Проверка картинки для новости
        $this->newsPicExist($carousel);

        // Новости по категории
        // Получаем все категории новостей
        $newsCategories = News_cat::all();

        // С помощью foreach каждой категории присвоим 5 последних новостей этой категории
        foreach ($newsCategories as $key => $category){
            $category['newsList'] = News::latest('created_at')
                ->where('news_cat_id', $category->id)
                ->take(5)
                ->get();

            // Проверка картинки для новости
            $this->newsPicExist($category['newsList']);
        }

        return view('index', compact('carousel', 'newsCategories'));
    }
}
