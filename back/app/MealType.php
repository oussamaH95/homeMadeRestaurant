<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealType extends Model
{
    protected $table = "meal_type";
    
    protected $fillable = [
        'name',
    ];
}
