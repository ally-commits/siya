<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MajorProgrammes extends Model
{
    protected $fillable = ['duration','level','userId','noOfBeneficiaries','department','programme','facultyAssociation'];
}
