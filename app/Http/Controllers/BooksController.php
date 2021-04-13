<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BooksController extends Controller
{
    public function create(){

        $authors = Author::all();

        return view ('books.create', compact('authors') );
        
    }

    public function store(Request $request){

        //dd($request->all());

        $name = $request->input('name');
        $isbn = $request->input('isbn');
        $description = $request->input('desc');

        $books = new Book;
        
        $books->name = $name;
        $books->isbn = $isbn;
        $books->desc = $description;

        $books->save();

        $authors = Author::find(request()->input('chose_author'));

        $books->authors()->attach($authors);

        return redirect ('book/show');
    }

    public function show(){

        $books = Book::all();

        return view ('books.show', compact('books'));
    }

    public function edit($id){

        $books = Book::where('id',$id)->get();
        $authors = Author::all();

        return view ('books.edit', compact ('books', 'authors') );
    } 

    public function update(Request $request, $id){

        //find existing book

        $books = Book::find($id);

        //find existing book

        $authors  = $books->authors;

        //Delete all authors

        $books->authors()->detach($authors);

        //update book

        // $name = $request->input('name');
        // $isbn = $request->input('isbn');
        // $description = $request->input('desc');

        
        
        // $books->name = $name;
        // $books->isbn = $isbn;
        // $books->desc = $description;

        $books->update(request (['name', 'isbn', 'desc']));

        //Attach new authors

        $authors = Author::find(request()->input('chose_author'));

        $books->authors()->attach($authors);

        return redirect ('book/show') ;
    }
}
