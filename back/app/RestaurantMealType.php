<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestaurantMealType extends Model
{
        protected $table = "restaurant_meal_type";
    
    protected $fillable = [
        'userId',
        'mealTypeId', 
    ];
}
