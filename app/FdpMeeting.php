<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FdpMeeting extends Model
{
    protected $fillable = ['place','name','from','organisers','level','to','desc','typeOfMeeting','userId','department','adminId','deptId'];
}
