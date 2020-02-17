<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffQualification extends Model
{
    protected $fillable = ['year','course','place','college','userId'];
}
