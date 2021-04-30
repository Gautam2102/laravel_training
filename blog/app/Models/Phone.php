<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    use HasFactory;

    // add table 
    protected $table='phones';

    // flase time stamps
    public $timestamps=false;
//  belongs to user
public function user(){

return $this->belongsTo('App\Models\User');
}
}