<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestVisited extends Model
{
    protected $fillable = ['name','date','designation','activityHeld','userId'];
}
