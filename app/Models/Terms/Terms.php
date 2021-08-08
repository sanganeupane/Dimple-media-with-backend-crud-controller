<?php

namespace App\Models\Terms;

use Illuminate\Database\Eloquent\Model;

class Terms extends Model
{
   protected $guarded='admin';
   protected $fillable=['description'];
}
