<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    protected $table = "meals";
    
    protected $fillable = [
        'name',
        'desc', 
        'small',
        'mid',
        'large',
        'img',
        'mealTypeId',
        'menuId',
        'userId', 
    ];
}
