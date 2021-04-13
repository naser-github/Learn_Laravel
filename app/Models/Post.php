<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
 

class Post extends Model
{
    protected $fillable = ['title', 'replace_col', 'body', 'slug', 'owner_id'];

    public function customers()
    {   
        return $this->belongsTo('App\Models\Customer', 'owner_id' );
    }

    
}
