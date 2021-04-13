<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventor;
use App\Models\Profile;
use App\Rules\maxvalue100;
use \Validator;
use Symfony\Contracts\Service\Attribute\Required;

class InventorsController extends Controller
{
    public function create(){
        
        return view('inventors.create');
    }

    public function store(Request $request){

        //Inventor::create(request()->except('_token'));


        //validation

        // request()->validate([
            
        //     'fname' => 'required|min:3',
        //     'lname' => 'required',
        //     'email' => 'required|email|unique:inventors',
        //     'dob' => 'required',
        //     'uname' => ['required', 'min:11', 'min:11','alpha_num'],
        //     //'pass' => 'required|confirmed:password_confirm' 
        //     //to match passwords it always has to be 'password' & 'password_confirmation' 
        // ],[
        //     'fname.required' => 'you have to provide firstname',
        //     'fname.min' => 'firstname has to be minimum 3 character',
        // ]); //method 1 for validation

        // $rules = [   
        //     'fname' => 'required|min:3',
        //     'lname' => 'required',
        //     'email' => 'required|email|unique:inventors',
        //     'dob' => 'required',
        //     'uname' => ['required', 'min:11', 'min:11','alpha_num'],
        //     //'pass' => 'required|confirmed:password_confirm' 
        //     //to match passwords it always has to be 'password' & 'password_confirmation' 
        // ];

        // $message = [
        //     'fname.required' => 'you have to provide firstname',
        //     'fname.min' => 'firstname has to be minimum 3 character'
        // ];

        // // request()->validate($rules, $message); //method 2 for validation

        // $request->validate($rules, $message); ////method 3 for validation

        //custom validation

        $rules = [
            'fname' => ['required', new maxvalue100]
        ];

        $validator = Validator::make($request->all(), $rules);

        if ( $validator->fails() ) {
            return back()->withErrors($validator)->withInput();
        }

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $uname = $request->input('uname');

        $inventors = new Inventor;

        $inventors->firstname = $fname;
        $inventors->lastname = $lname;
        $inventors->dob = $dob;
        $inventors->email = $email;
        $inventors->username = $uname;

        $inventors->save();

        $dp = $request->input('dp');
        $bio = $request->input('bio');
        $address = $request->input('add');
        $owner_id = $request->input('owner_id');

        $profiles = new Profile;

        $profiles->dp = $dp;
        $profiles->bio = $bio;
        $profiles->address = $address;
        $profiles->owner = $owner_id;

        $profiles->save();
        
        return redirect('inventors/show'); //return back to the link
    }

    public function show(){
        
        $inventors = Inventor::all();

        return view ('inventors.show', compact('inventors'));
    }

    public function profile($id){
        
        $profiles = Profile::where('owner',$id)->get();

        return view ('inventors.profile', compact('profiles'));

    }

    public function delete($id)
    {
        $destroy1 = inventor::where('id',$id)->first();
        $destroy2 = Profile::where('owner',$id)->first();

        $destroy2->delete();
        $destroy1->delete();
        

        return redirect ('inventors/show');
    }

    public function edit($id){
        $inventor = Inventor::where('id',$id)->get();

        return view ('inventors.edit', compact ('inventor') );
    }

    public function update($id, Request $request){

        $rules = [   
            'fname' => 'required|min:3',
            'lname' => 'required',
            'email' => 'required|email|unique:inventors, id, {$id}',
            'dob' => 'required',
            'uname' => ['required', 'min:11', 'min:11','alpha_num'],
            //'pass' => 'required|confirmed:password_confirm' 
            //to match passwords it always has to be 'password' & 'password_confirmation' 
        ];

        $message = [
            'fname.required' => 'you have to provide firstname',
            'fname.min' => 'firstname has to be minimum 3 character'
        ];

        $request->validate($rules, $message); ////method 3 for validation
        
        $inventors = Inventor::find($id);

        $fname = $request->input('fname');
        $lname = $request->input('lname');
        $dob = $request->input('dob');
        $email = $request->input('email');
        $uname = $request->input('uname');

        $inventors->firstname = $fname;
        $inventors->lastname = $lname;
        $inventors->dob = $dob;
        $inventors->email = $email;
        $inventors->username = $uname;

        $inventors->save();

        return redirect ('inventors/show');

    }
}
