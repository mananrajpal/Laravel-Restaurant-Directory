<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*-------
TASK 2.1
-------*/
Route::get('/show_restaurant', 'RestaurantController@showRestaurant');

/*-------
TASK 3.1
-------*/
Route::get('/showAllRestaurants', 'RestaurantController@ShowAllRestaurants');
Route::get('/InsertRestaurant/{restname}/{restphone}/{restaddress1}/{restaddress2}/{suburb}/{state}/{numberofseats}', 'RestaurantController@InsertRestaurant');
Route::get('/UpdateRestaurant/{restid}/{restname}/{restphone}/{restaddress1}/{restaddress2}/{suburb}/{state}/{numberofseats}', 'RestaurantController@UpdateRestaurant');
Route::get('/DeleteRestaurant/{restid}', 'RestaurantController@DeleteRestaurant');

/*-------
TASK 4.1
-------*/
Route::resource('categories', 'CategoryController');
Route::resource('countries', 'CountryController');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('role_users', 'RoleUserController');
Route::resource('restaurants', 'RestaurantController');
Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');
