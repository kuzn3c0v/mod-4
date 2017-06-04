<?php

namespace App\Http\Controllers;

use App\News;
use App\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchBar(){

        if (isset($_POST['letters'])){
            $letters = $_POST['letters'];
        }else{
            abort('404');
        }

        $tags = Tag::select(['id', 'name'])
            ->where('name', 'LIKE', $letters.'%')
            ->get();

        return json_encode($tags);
    }
}
