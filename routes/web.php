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

Route::get('/','HomeController@welcome')->name('welcome');
Route::get('/search-properties','HomeController@searchProperty')->name('search.initial');
Route::get('/show/property/{property}', 'PropertyController@show')->name('property.single');
Route::post('/property/message/{property}', 'PropertyController@messageStore')->name('message.store');
Auth::routes(['verify' => true]);

Route::middleware(['auth','verified','admin'])->group(function (){
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/property/create', 'PropertyController@create')->name('property.create');
    Route::get('/property/list', 'PropertyController@index')->name('property.list');
    Route::get('/property/{property}', 'PropertyController@edit')->name('property.edit');
    Route::get('/not-added-amenities', 'AmenitiesController@index')->name('property.amenity');
    Route::get('/edit-amenities', 'AmenitiesController@edit')->name('property.amenity.edit');
    Route::get('/property/add-amenities/{property}', 'AmenitiesController@create')->name('property.addAmenitiesForm');
    Route::get('/property/edit-amenities/{property}', 'AmenitiesController@editForm')->name('property.updateAmenitiesForm');
    Route::get('/allmessage/property', 'PropertyController@adminSeeMessage')->name('property.allmessage');
    //post methods
    Route::post('/property/create', 'PropertyController@store')->name('property.store');
    Route::post('/property/amenities/add-amenities/{property}', 'AmenitiesController@store')->name('property.addAmenities');

    //patch methods
    Route::patch('/property/{property}', 'PropertyController@update')->name('property.update');
    Route::patch('/property/edit-amenities/{amenities}', 'AmenitiesController@update')->name('property.amenity.update');
    //delete methods
    Route::delete('/property/{property}','PropertyController@destroy')->name('property.delete');
});

Route::middleware(['auth','verified','user'])->group(function (){
    Route::get('/home', 'HomeController@index')->name('home');

});
