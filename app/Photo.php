<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    // dinamic route to photos on users.index
    protected $uploads = '/images/';
    
    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
    
    protected $fillable = ['file'];
}
