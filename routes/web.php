<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//Admin Role
Route::middleware("AdminOnly")->group(function(){
    Route::get("/user-manager","UserManagerController@index")->name("user-manager.index");
    Route::post("/make-admin","UserManagerController@makeAdmin")->name("user-manager.makeAdmin");
    Route::post("/make-manager","UserManagerController@makeManager")->name("user-manager.makeManager");
    Route::post("/change-user-password","UserManagerController@changeUserPassword")->name("user-manager.changeUserPassword");
    Route::post("/floor-update/{id}","HotelManagerController@updatelevel")->name('hotel-manager.updatelevel');
    Route::post("/room-update/{id}","HotelManagerController@updateroom")->name('hotel-manager.updateroom');
    Route::post("/type-update/{id}","HotelManagerController@updatetype")->name('hotel-manager.updatetype');
    Route::get("/type-list","HotelManagerController@list")->name("hotel-manager.list");
    Route::get("/type-list/type-edit/{id}","HotelManagerController@typeedit")->name('hotel-manager.typeedit');
    Route::get("/floor-list","HotelManagerController@floorlist")->name("hotel-manager.floorlist");
    Route::get("/floor-list/floor-edit/{id}","HotelManagerController@flooredit")->name('hotel-manager.flooredit');
    Route::get("/room-list","HotelManagerController@room")->name("hotel-manager.room");
    Route::get("/room-list/room-edit/{id}","HotelManagerController@roomedit")->name('hotel-manager.roomedit');
    Route::get("/hotel-manager/hotel-room-form","HotelManagerController@hotelroomcreate")->name("hotel-manager.hotelroomcreate");
    Route::post("/room-create","HotelManagerController@roomstore")->name("hotel-manager.roomstore");
    Route::post("/floor-create","HotelManagerController@floorstore")->name("hotel-manager.floorstore");
    Route::post("/type-create","HotelManagerController@roomtypestore")->name("hotel-manager.roomtypestore");
    Route::get("/floor-delete/{id}","HotelManagerController@floordestroy")->name("hotel-manager.floordestroy");
    Route::get("/room-delete/{id}","HotelManagerController@roomdestroy")->name("hotel-manager.roomdestroy");
    Route::get("/type-delete/{id}","HotelManagerController@roomtypedestroy")->name("hotel-manager.roomtypedestroy");
    Route::post("/hotel-room-create","HotelManagerController@hotelroomstore")->name("hotel-manager.hotelroomstore");
    Route::get("/hotel-room-delete/{id}","HotelManagerController@hotelroomdestroy")->name("hotel-manager.hotelroomdestroy");
    Route::get("/hotel-manager/hotel-edit/{id}","HotelManagerController@hotelroomedit")->name('hotel-manager.hotelroomedit');
    Route::post("/hotel-update/{id}","HotelManagerController@updatehotel")->name('hotel-manager.updatehotel');
    Route::get('/export', 'CsvFile@csv_export')->name('export');
});

//Manager role
Route::middleware("Manager")->group(function(){    
    Route::get("/hotel-manager/hotel-edit/{id}","HotelManagerController@hotelroomedit")->name('hotel-manager.hotelroomedit');
    Route::post("/hotel-update/{id}","HotelManagerController@updatehotel")->name('hotel-manager.updatehotel');
    Route::get('/export', 'CsvFile@csv_export')->name('export');
});    
//User Role
Route::get("/hotel-reservation-list/hotel-reservation","HotelManagerController@reserve")->name("hotel-manager.reserve");
Route::get("/hotel-manager","HotelManagerController@index")->name("hotel-manager.index");
Route::post("/reservation-form1","HotelManagerController@reservationstore")->name("hotel-manager.reservationstore");
Route::get("/hotel-reservation-list","HotelManagerController@reservelist")->name("hotel-manager.reservelist");

//profile
Route::prefix('profile')->group(function(){
    Route::get('/','ProfileController@profile')->name('profile');
    Route::get('/edit-password','ProfileController@editPassword')->name('profile.edit.password');
    Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
});