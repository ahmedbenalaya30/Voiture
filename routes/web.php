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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('car', 'CarsController');
Route::resource('user','UsersController');
Route::resource('booking', 'bookingsController');
Route::resource('part','PartsController');
Route::any('/userBookings/{id}','UsersController@search')->name('search');
Route::any('/availableCars','BookingsController@searchCar')->name('searchCar');
Route::any('/planning','BookingsController@planning')->name('planning');
Route::any('/facture/{id}','BookingsController@facture')->name('facture');
Route::any('/booking1/{id}','BookingsController@paid')->name('paid');
Route::any('/paidBooking','BookingsController@paidBookings')->name('paidBookings');
Route::any('/unpaidBooking','BookingsController@unpaidBookings')->name('unpaidBookings');
Route::any('/part/{id}','PartsController@plus')->name('plus');
Route::any('/part1/{id}','PartsController@moins')->name('moins');
Route::any('/user/{id}','UsersController@block')->name('block');
Route::any('/user1/{id}','UsersController@disblock')->name('disblock');
Route::any('/userBanned','UsersController@userBanned')->name('userBanned');













