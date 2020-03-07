<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminarAttended extends Model
{
    protected $fillable = ['name','date','place','prize','userId','title','level'];
}
