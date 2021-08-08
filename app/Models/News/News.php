<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded='admin';
    protected $fillable= ['title','address','description','image'];

}
