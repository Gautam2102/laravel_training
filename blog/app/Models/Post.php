<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // add table 
    protected $table='posts';
    // flase time stamps
    public $timestamps=false;

    // add comments
public function comments(){

return $this->hasMany(Comment::class);

}

}
