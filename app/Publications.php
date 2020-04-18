<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publications extends Model
{
    protected $fillable = ['name','type',"date","indexing","subject","issues","volume","NumberOfPages",'userId','collabration'];
}
