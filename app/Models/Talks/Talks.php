<?php

namespace App\Models\Talks;

use Illuminate\Database\Eloquent\Model;

class Talks extends Model
{
    protected $guarded='admin';
    protected $fillable= ['title','description','image'];
}
