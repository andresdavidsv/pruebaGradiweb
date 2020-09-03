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


// Diseño Web
// Diseño Web
Route::get('/', function () {
        return view('index');
})->name('index');

// Rutas para Propietarios

    // Rutas para borrado y restauracion
    Route::get('/owners/trash','OwnerController@trashed')
    ->name('owners.trashed');
    Route::get('/owners/{owner}/restore','OwnerController@restore')
    ->name('owners.restore');
    Route::patch('/owners/{owner}/trash','OwnerController@trash')
    ->name('owners.trash');
    // Rutas para CRUD
    Route::Resource('owners', 'OwnerController');

// Rutas para Carros

    // Rutas para borrado y restauracion
    Route::get('/cars/trash','CarController@trashed')
    ->name('cars.trashed');
    Route::get('/cars/{car}/restore','CarController@restore')
    ->name('cars.restore');
    Route::patch('/carS/{car}/trash','CarController@trash')
    ->name('cars.trash');
    // Rutas para CRUD
    Route::Resource('cars', 'CarController');
