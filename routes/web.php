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


Route::get('/home','PageController@index');
Route::get('/house','PageController@index');
Route::get('/land','PageController@land');
Route::get('/apartment','PageController@apartment');
Route::get('/building','PageController@building');
Route::get('/warehouse','PageController@warehouse');
Route::get('/blog','PageController@blog');
Route::get('/about','PageController@about');
Route::get('/contactus','PageController@contactus');

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
Route::get('/house/serach/view','PageController@viewpost');




Route::post('/search','PageController@store');
Route::post('/sendmessage','MessageController@store');
Route::post('/profile/updateavatar','ProfileController@updateAvatar')->middleware('auth');



Auth::routes();