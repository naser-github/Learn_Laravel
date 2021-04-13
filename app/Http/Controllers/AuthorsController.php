<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;



class AuthorsController extends Controller
{
    public function create(){
        
        return view ('author.create');
    }

    public function store(Request $request){
        
        $a_name = $request->input('author_name');
        $a_email = $request->input('author_email');
        
        $author = new Author;
        $author->name = $a_name;
        $author->email = $a_email;

        $author->save();

        return redirect ('author/show');

    }
    
    public function show(){

        $authors = Author::paginate(2);

        return view ('author.show', compact('authors'));
    }
}
