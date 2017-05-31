<?php
namespace App\Traits;

// Трейт на проверку существования картинок для новостей. Если картинки нет - загрузит стандартную

trait newsPicExist{

    public function newsPicExist($news){
        $path = public_path('pictures' . DIRECTORY_SEPARATOR . 'news');
        foreach ($news as $value){
            if ((!file_exists($path . DIRECTORY_SEPARATOR . $value->img_title)) || empty($value->img_title)){

                $value->img_title = 'Spare-picture-700x450.jpg';
            }
        }
        return $news;
    }
}