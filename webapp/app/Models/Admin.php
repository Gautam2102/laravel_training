<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;

    protected $table = 'admins';

    protected $fillable = [
        'name', 'password', 'token',
    ];

    protected $hidden = [
        'password', 'token',
    ];
}
