<?php

namespace App\Models\Opinion;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $guarded='admin';
    protected $fillable= ['title','description','image'];

}
