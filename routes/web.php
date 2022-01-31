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

Route::group( [ 'namespace' => 'admin' , 'prefix' => 'admin' , 'middleware' => [ 'auth' , 'admin' ] ] , function () {
    Route::get('/', 'BrandController@index')->name('admin');
    Route::get ( '/brand' , 'BrandController@index' )->name ( 'admin.brand' );
    Route::get ( '/brand/create' , 'BrandController@create' )->name ( 'admin.brand.create' );
    Route::patch ( '/brand/store' , 'BrandController@store' )->name ( 'admin.brand.store' );
    Route::get ( '/brand/{id}/edit' , 'BrandController@edit' )->name ( 'admin.brand.edit' );
    Route::patch ( '/brand/{id}/update' , 'BrandController@update' )->name ( 'admin.brand.update' );
    Route::patch ( '/brand/{id}/delete' , 'BrandController@destroy' )->name ( 'admin.brand.delete' );
    Route::patch ( '/brand/{id}/published' , 'BrandController@published' )->name ( 'admin.brand.published' );

    Route::get ( '/models' , 'ModelsController@index' )->name ( 'admin.models' );
    Route::get ( '/models/create' , 'ModelsController@create' )->name ( 'admin.models.create' );
    Route::patch ( '/models/store' , 'ModelsController@store' )->name ( 'admin.models.store' );
    Route::get ( '/models/{id}/edit' , 'ModelsController@edit' )->name ( 'admin.models.edit' );
    Route::patch ( '/models/{id}/update' , 'ModelsController@update' )->name ( 'admin.models.update' );
    Route::patch ( '/models/{id}/delete' , 'ModelsController@destroy' )->name ( 'admin.models.delete' );
    Route::patch ( '/models/{id}/published' , 'ModelsController@published' )->name ( 'admin.models.published' );

    Route::get ( '/cars' , 'CarsController@index' )->name ( 'admin.cars' );
    Route::get ( '/cars/create' , 'CarsController@create' )->name ( 'admin.cars.create' );
    Route::patch ( '/cars/store' , 'CarsController@store' )->name ( 'admin.cars.store' );
    Route::get ( '/cars/{id}/edit' , 'CarsController@edit' )->name ( 'admin.cars.edit' );
    Route::patch ( '/cars/{id}/update' , 'CarsController@update' )->name ( 'admin.cars.update' );
    Route::patch ( '/cars/{id}/delete' , 'CarsController@destroy' )->name ( 'admin.cars.delete' );
    Route::patch ( '/cars/{id}/published' , 'CarsController@published' )->name ( 'admin.cars.published' );
    Route::post ( '/cars/image' , 'CarsController@ajaxResult' )->name ( 'admin.cars.image' );

    Route::post ( '/ajaxModels' , 'CarsController@ajaxResult' )->name ( 'admin.ajax.models' );
});

Route::group ( [ 'namespace' => 'front' , 'prefix' => '/' ] , function () {
    Route::get ( '/' , 'HomeController@index')->name ( 'main' );
    Route::get ( '/reg' , 'LoginAndRegistrController@index')->name ( 'login.and.registr' );
    Route::get ( 'add/brand' , 'FrontBrandController@index' )->name( 'front.create.brand' )->middleware ( 'auth' );
    Route::patch ( '/brand/store' , 'FrontBrandController@store' )->name ( 'front.store.brand' )->middleware ( 'auth' );
    Route::get ( 'add/model' , 'FrontModelController@index' )->name( 'front.create.model' )->middleware ( 'auth' );
    Route::patch ( '/model/store' , 'FrontModelController@store' )->name ( 'front.store.model' )->middleware ( 'auth' );
    Route::get ( 'add/car' , 'FrontCarController@index' )->name( 'front.create.car' )->middleware ( 'auth' );
    Route::patch ( '/car/store' , 'FrontCarController@store' )->name ( 'front.store.car' )->middleware ( 'auth' );
    Route::post ( '/frontajaxModels' , 'FrontModelController@ajaxResult' )->name ( 'front.ajax.models' );
    Route::get ( '/cars' , 'HomeController@show')->name ( 'main.cars' );
    Route::get ( '/cars/show/{id}' , 'HomeController@infoview')->name ( 'main.cars.show' );
});
