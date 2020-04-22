<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papers extends Model
{
    protected $fillable = ['name','staffname','title','venue','theme','prizes','nature','userId','date','type','dept','adminId'];
}
