<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoryController extends Controller
{
    public function create(){
         return view('category.create');
    }

    public function store(Request $request ){
        //parameter need only for 3rd approach

        ////1st way to fetch
        //$name = request('category_form'); 
        
        //2nd way to fetch
        //$name= request()->input('category_form'); 
        
        //3rd approach
        $name = $request->input('category_form');

        //1st approach to save data
        //category::create([ 'name' => $name]);


        //2nd approach to save data
        $category = new category;
        $category->name = $name;     
        $category->save();

        //3rd approach to save data
        //category::create( $request->all() ); //use only if all values of a table are inserted
        //category::create( $request->only('name') ); 

        //return back(); //return back to the previous page
        
        return redirect('data/show'); //return back to the link
    }   

    public function show(){
        
        $categories = category::all();

        return view('category.show', compact('categories') );
    }
    
    public function edit($name){
        
        $names = category::where('name', $name)->first();
        //$category = category::find('name');
        
        return view('category.edit', compact('names'));
    }

    public function update($name)
    {
        $names = category::where('name',$name)->first();

        $nam = request('category_form');
        
        $names->name = $nam;

        $names->save();

        return redirect ('data/show') ;
    }

    public function delete($delete){
        
        $destroy = category::where('name',$delete)->first();

        $destroy->delete();

        return back();
    }
}