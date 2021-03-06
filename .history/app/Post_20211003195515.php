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
        
        if($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }
        if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }
    
}




//========================OLD CODE=====================
//protected $guarded = [];

// Comment::create([
//     'body' => request('body'),
//     'post_id' => $this->id
// ]);

// return $this->hasMany('\App\Comment');