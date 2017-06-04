<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchBar(){

        if (isset($_POST['letters'])){
            $letters = $_POST['letters'];
        }else{
            abort(404);
        }

        $tags = Tag::where('name', 'LIKE', $letters.'%')
            ->get();

        return $tags;
    }
}
