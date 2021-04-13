<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Person;

class PersonsController extends Controller
{
    public function see(){
        
        $person_list = Person::all();
        
        return view ('table.person_table', compact('person_list') );
    }
}
