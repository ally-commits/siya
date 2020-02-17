<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StaffProfile extends Model
{
    protected $fillable = [
        'dob','department', 'address','userId','departmentId','gender','bloodGroup','phoneNumber','image',
    ];
}
