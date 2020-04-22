<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achivements extends Model
{
    protected $fillable = ['name','dept','achive','place','organisation','nature','level','date','guidedBy','userId','adminId'];
}
