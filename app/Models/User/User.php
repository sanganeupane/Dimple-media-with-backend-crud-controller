<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Auth;

class User extends Auth
{
    protected $guarded='web';
    protected $fillable= ['name','username','email','password','image','status'];
}
