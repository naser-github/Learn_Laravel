<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomesController extends Controller
{
    public function func_homepage(){
        return view ('home/homepage');
    }

    public function func_trending_places(){
        return view ('home.trending');
    }

    public function func_blog(){
        return view ('home.blog');
    }
}