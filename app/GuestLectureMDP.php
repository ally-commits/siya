<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestLectureMDP extends Model
{
    protected $fillable = ['date','resourcePerson','place','topic','department','designation','beneficiaries','userId'];
}
