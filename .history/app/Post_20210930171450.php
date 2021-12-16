<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{
    public function comments()
    {
        return $this->hasMany(Comment::class);
        
        // return $this->hasMany('\App\Comment');
    }

    public function addComment($body)
    {

     

       //add a comment to a post
        $this->comments()->create(compact('body'));
      
    }
    
    public function user(){

        return $this->belongsTo(User::class);
    }

    public function scopeFilter($query, $filters){
        
        if($month = $filters['month'])
        {
            $query->whereMonth('created_at',Carbon::parse($month)->month);
        }

        if($year = request('year'))
        {
            $query -> whereYear('created_at',$year);
        }
    }
    
}




//========================OLD CODE=====================
//protected $guarded = [];

// Comment::create([
//     'body' => request('body'),
//     'post_id' => $this->id
// ]);

// return $this->hasMany('\App\Comment');