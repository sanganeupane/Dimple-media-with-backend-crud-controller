<?php

namespace App\Models\Contact;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    protected $guarded='admin';
    protected $fillable= ['address','city','country','email','phone'];
}
