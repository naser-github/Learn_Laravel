<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUpController extends Controller
{
    public function upload()
    {
        return view('upload.fileup');
    }

    public function store()
    {
        request()->validate([
            'user_img'=>'required|image|mimes:jpeg,png,jpg|max:1000' 
                //mimes is to identify file extension
        ]);

        if(request()->hasFile('user_img')){
            $destinationPath = 'uploads';

            // using request function for uploading single file

            // // $file_name = request()->file('user_img')->getClientOriginalName();
            // $ext = request()->file('user_img')->getClientOriginalExtension();
            // // $file_name = rand().".".$ext; // uses random number for img name
            // $file_name = uniqid().".".$ext; //uses unique id for img name
            
            // request()->file('user_img')->move($destinationPath, $file_name);
            
            
            $all_file = request()->file('user_img');

            foreach ($all_file as $file){
                
                $ext = $file->getClientOriginalExtension();
                $file_name = uniqid().".".$ext; //uses unique id for img name

                $file->move($destinationPath, $file_name);
            }

            return back();
        }

        
    }
}
