<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    //

    public function index(){
        $mass = [2, 4, 6, 0, 5, 1, 3, 7];

        foreach ($mass as $key1 => $value1){

            for ($i = 0; $i < 8; $i++){
                if (($key1 < $i) && ($mass[$key1] > $mass[$i])){
                    $mass[$key1] += $mass[$i];
                    $mass[$i] = $mass[$key1] - $mass[$i];
                    $mass[$key1] = $mass[$key1] - $mass[$i];
                }
            }
        }
        var_dump($mass);
    }
}
