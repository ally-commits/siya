<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeminarOrganised extends Model
{
    protected $fillable = ['title','date','placeAndDesignation','collabAgency','userId','speaker','topic','beneficiaries','department','level'];
}
