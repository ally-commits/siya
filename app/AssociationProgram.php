<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssociationProgram extends Model
{
    protected $fillable = ['name','level','nature','NumberOfStudents','guest','date','place','userId'];
}
