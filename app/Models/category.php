<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $primaryKey = 'name';
    protected $fillable=['name'];
    public $incrementing = false; //if primary key is not id

    public function customer(){
        
        return $this->belongsTo('App\Models\Country');
    }
}
