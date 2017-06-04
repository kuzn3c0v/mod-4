<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Request;
use App\User;

class CommentsController extends Controller
{
    public function post(){

        Auth::user()->find_comments()->save(new Comment(Request::all()));

        return Redirect::back();
    }
}
