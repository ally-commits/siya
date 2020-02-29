<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FdpMeeting extends Model
{
    protected $fillable = ['place','name','duration','organisers','level','date','typeOfMeeting','userId','department'];
}
