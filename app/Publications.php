<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    protected $fillable = ['name','publication_number','userId','collabration'];
}
