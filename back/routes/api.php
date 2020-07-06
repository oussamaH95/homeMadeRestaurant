<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
//Authentications
Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

Route::group(['middleware' => ['jwt.verify']], function() {

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/

//menuList Table --> get all menus
Route::get('/menus', 'MenuListController@all');

//get menu by id 
Route::get('/menu/{id}', 'MenuListController@find');

//create a menu
Route::post('/menu','MenuListController@store');

//update a menu 
Route::put('/menu/{id}', 'MenuListController@update');

//delete a menu 
Route::delete('/menu/{id}', 'MenuListController@destroy');

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
});


/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
//cities Table --> get all cities
Route::get('/cities', 'CityController@all');

//get city by id 
Route::get('/city/{id}', 'CityController@find');

//create a city
Route::post('/city','CityController@store');

//update a city 
Route::put('/city/{id}', 'CityController@update');

//delete a city 
Route::delete('/city/{id}', 'CityController@destroy');

/*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
