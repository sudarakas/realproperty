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




Route::get('/','PageController@index');
Route::get('/logout','PageController@logout');

Route::get('/admin','AdminController@index')->name('admin.dashboard');
Route::get('/admin/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login','Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('/home','PageController@index');
Route::get('/house','PageController@index');
Route::get('/land','PageController@land');
Route::get('/apartment','PageController@apartment');
Route::get('/building','PageController@building');
Route::get('/warehouse','PageController@warehouse');
Route::get('/blog','PageController@blog');
Route::get('/about','PageController@about');
Route::get('/contactus','PageController@contactus');


Route::get('/add','PageController@addProperty');

Route::get('/add/house','PageController@addHouse');
Route::post('/add/house','PropertyController@addHouse');

Route::get('/add/land','PageController@addLand');
Route::post('/add/land','PropertyController@addLand');

Route::get('/add/building','PageController@addBuilding');
Route::post('/add/building','PropertyController@addBuilding');

Route::get('/add/apartment','PageController@addApartment');
Route::post('/add/apartment','PropertyController@addApartment');

Route::get('/add/warehouse','PageController@addWarehouse');
Route::post('/add/warehouse','PropertyController@addWarehouse');

Route::get('/add/map','PageController@dismap');


Route::get('/profile','PageController@profile')->middleware('auth');
Route::get('/profile/changepassword','PageController@changePassword')->middleware('auth');
Route::get('/profile/editaccount','PageController@editAccount')->middleware('auth');
Route::get('/profile/favorite','PageController@favorites')->middleware('auth');
Route::get('/profile/message','PageController@myMessage')->middleware('auth');
Route::get('/profile/message/view','PageController@viewMessage')->middleware('auth');
Route::get('/profile/deleteaccount','PageController@deleteaccount')->middleware('auth');
Route::get('/profile/myhouse','PageController@myhouse')->middleware('auth');
Route::get('/profile/myland','PageController@myland')->middleware('auth');
Route::get('/profile/myapartment','PageController@myapartment')->middleware('auth');
Route::get('/profile/mybuilding','PageController@mybuilding')->middleware('auth');
Route::get('/profile/mywarehouse','PageController@mywarehouse')->middleware('auth');

Route::get('/house/serach','PageController@housesearch');
Route::get('/house/{house}','HouseController@viewHouse');

Route::get('/land/serach','PageController@landsearch');
Route::get('/land/{land}','LandController@viewLand');



Route::post('/search','PageController@store');
Route::post('/sendmessage','MessageController@store');
Route::post('/profile/updateavatar','ProfileController@updateAvatar')->middleware('auth');


Route::post('/admin/updateavatar','AdminController@updateAvatar')->middleware('auth');



// Auth::routes();
Auth::routes(['verify' => true]);