<?php

namespace App\Models\Privacy;

use Illuminate\Database\Eloquent\Model;

class Privacy extends Model
{
    protected $guarded='admin';
    protected $fillable= ['description'];

}
