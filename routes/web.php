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

Route::name('/home')->get('/')->uses('PageController@index');
Route::get('/home','PageController@index');
Route::get('home','PageController@index');
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



Route::get('/house/serach','PageController@housesearch');
Route::get('/house/{house}','HouseController@viewHouse');
Route::post('/house/{house}','HouseController@searchHouse');
Route::post('/house/{house}/offer','OfferController@houseOffer');
Route::post('/house/{house}/contactowner','UserEmailController@houseContact');
Route::post('/house/{house}/report','ReportPropertyController@houseReport');

Route::get('/land/serach','PageController@landsearch');
Route::get('/land/{land}','LandController@viewLand');
Route::post('/land/{land}','LandController@searchLand');
Route::post('/land/{land}/offer','OfferController@landOffer');
Route::post('/land/{land}/contactowner','UserEmailController@landContact');
Route::post('/land/{land}/report','ReportPropertyController@landReport');

Route::get('/building/serach','PageController@buildingsearch');
Route::get('/building/{building}','BuildingController@viewBuilding');
Route::post('/building/{building}','BuildingController@searchBuilding');
Route::post('/building/{building}/offer','OfferController@buildingOffer');
Route::post('/building/{building}/contactowner','UserEmailController@buildingContact');
Route::post('/building/{building}/report','ReportPropertyController@buildingReport');

Route::get('/apartment/serach','PageController@apartmentsearch');
Route::get('/apartment/{apartment}','ApartmentController@viewApartment');
Route::post('/apartment/{apartment}','ApartmentController@searchApartment');
Route::post('/apartment/{apartment}/offer','OfferController@apartmentOffer');
Route::post('/apartment/{apartment}/contactowner','UserEmailController@apartmentContact');
Route::post('/apartment/{apartment}/report','ReportPropertyController@apartmentReport');

Route::get('/warehouse/serach','PageController@warehousesearch');
Route::get('/warehouse/{warehouse}','WarehouseController@viewWarehouse');
Route::post('/warehouse/{warehouse}','WarehouseController@searchWarehouse');
Route::post('/warehouse/{warehouse}/offer','OfferController@warehouseOffer');
Route::post('/warehouse/{warehouse}/contactowner','UserEmailController@warehouseContact');
Route::post('/warehouse/{warehouse}/report','ReportPropertyController@warehouseReport');


Route::post('/search','PageController@store');
Route::post('/sendmessage','MessageController@contactUsEmail');

//User Profile Section
Route::get('/profile','ProfileController@loadUserDashboard')->middleware('auth');
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
Route::post('/profile/updateavatar','ProfileController@updateAvatar')->middleware('auth');

Route::post('/profile/updateAccount','ProfileController@updateAccount')->middleware('auth');
Route::post('/profile/updatepassword','ProfileController@changePassword')->middleware('auth');

//Admin Panel
Route::post('/admin/updateavatar','AdminController@updateAvatar')->middleware('auth');

//Blog
Route::get('/blog','PageController@showBlog');
Route::get('/blog/view','PageController@showBlogPost');

// Auth::routes();
Auth::routes(['verify' => true]);