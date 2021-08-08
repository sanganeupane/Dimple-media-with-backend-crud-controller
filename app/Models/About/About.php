<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded='admin';
    protected $fillable= ['description','image'];

}
