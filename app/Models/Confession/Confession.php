<?php

namespace App\Models\Confession;

use Illuminate\Database\Eloquent\Model;

class Confession extends Model
{
    protected $guarded='admin';
    protected $fillable= ['title','address','gender','age','description','image'];

}
