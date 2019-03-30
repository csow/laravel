<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['category_id','photo_id','title','body'];
    
    public function user (){
        return $this->belongsTo('App\User');
    }
    
     public function photo (){
        return $this->belongsTo('App\Photo');
    }
    
     public function category (){
        return $this->belongsTo('App\Category','category_id');
    }
    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
    // search
    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("body", "LIKE","%$keyword%")
                    ->orWhere("title", "LIKE", "%$keyword%");
                    
                    
            });
        }
        return $query;
    }
}
