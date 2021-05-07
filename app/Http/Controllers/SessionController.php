<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function create(){
        
        // 1st method
        
        request()->session->put('user_name','Abu Naser'); //creates a session
        request()->session->pull('user_name'); //delete a session
        request()->session->get('user_name'); //gets session value

        // 2nd method

        session(['user_name' => 'Abu Naser']); //creates a session
        session()->pull(); //delete a session
        session() ->get('user_name'); //gets session value
        session() ->get('user_name',"if session value is null print this default value "); //if a session value is empty then it will the default value for that session
        session()->has('user_name')? 'yes':'no'; //will return binary value 0 or  1
        session()->exist('user_name')? 'yes':'no'; //if session value exist

    }
}
