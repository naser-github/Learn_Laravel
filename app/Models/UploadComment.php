<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UploadComment extends Model
{
    protected $guarded = [];

    public function commentable(){
        
        return $this->morphTo();
    }
}
