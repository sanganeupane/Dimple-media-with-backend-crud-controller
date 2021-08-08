<?php

namespace App\Models\Ourteam;

use Illuminate\Database\Eloquent\Model;

class Ourteam extends Model
{

    protected $guarded='admin';
    protected $fillable= ['name','post','image'];

}
