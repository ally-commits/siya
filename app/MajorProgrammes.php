<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorProgrammes extends Model
{
    protected $fillable = ['from','to','level','userId','noOfBeneficiaries','department','programme','facultyAssociation','desc'];
}



