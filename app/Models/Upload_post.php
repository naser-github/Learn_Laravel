<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload_post extends Model
{
    protected $guarded = [];

    public function upload_photos(){

        return $this->morphOne('App\Models\Upload_post', 'image'); 
    }
}
