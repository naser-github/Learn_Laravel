<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Customer;


class PostController extends Controller
{
    public function show(){
        
        $shows = Post::all();

        return view('post.show', compact('shows'));
    }

    public function more($id){
        
                
        $check = Customer::where('name',$id)->get();
        
        return view ('post.more', compact('check'));
    }
}
