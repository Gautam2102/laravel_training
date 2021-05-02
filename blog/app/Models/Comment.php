<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    //  add table 
    protected $table='comments';

    // timestamps
    public $timestamps=false;

    // add post
    public function post()
    {
       return $this->belongsTo(Post::class);
    }

}




