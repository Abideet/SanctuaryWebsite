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


Route::get('userAdoption', function(){
    return view('userAdoption');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use App\Http\Controllers\AnimalController;
Route::resource('animals',AnimalController::class);

use App\Http\Controllers\AdoptionController;
Route::resource('adoptions',AdoptionController::class);

//Route to update adoption form
Route::get('adoptions/edit',[App\Http\Controllers\AdoptionController::class, 'update']);

//Route to display data to the display view
Route::get('display',[App\Http\Controllers\DisplayController::class, 'index']);

//Routes for displaying animals table inside home page
Route::get('home',[App\Http\Controllers\DisplayController::class, 'index2']);

//Routes for displaying adoption table inside adoption page
Route::get('/adoption',[App\Http\Controllers\AdoptionController::class, 'index2']);

//Routes for displaying adoption table inside userAdoption page
Route::get('/userAdoption',[App\Http\Controllers\AdoptionController::class, 'index3']);

//Routes for displaying adoptions table inside home page
Route::get('/home',[App\Http\Controllers\AdoptionController::class, 'index4']);