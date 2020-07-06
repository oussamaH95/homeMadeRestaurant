<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
        protected $table = "courses";
    
    protected $fillable = [
        'openTime',
        'closeTime', 
        'userId',
        'dayId',
    ];
}
