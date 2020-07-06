<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\menuList;
use App\Day;
use App\MealTypeController;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
    protected $table = 'users';

    protected $fillable = [
        'name', 'password','desc',
        'about', 'phoneNumber','addressDetails',
        'restName', 'sinceDate','cityId',
    ];

        public function menuList()
    {    
        return $this->hasMany(MenuList::class, 'user_id', 'id');
    }
        public function Schedule()
    {  
        return $this->belongsToMany(Day::class, 'schedule', 'user_id', 'day_id');
    }
        public function types()
    {  
        return $this->belongsToMany(Student::class, 'restaurant_meal_type', 'user_id', 'student_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
            public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function setPasswordAttribute($password)
    {
        if ( !empty($password) ) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
