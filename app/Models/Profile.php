<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use App\Models\inventor;

class Profile extends Model
{
    public function inventor(){
        
        return $this->belongsTo('App\Models\inventor','owner');

        //return $this->hasOne('App\Models\inventor', 'id');

    }

}
