<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuList extends Model
{
        protected $table = "menu_list";
    
    protected $fillable = [
        'name',
        'desc', 
        'userId',
    ];
}
