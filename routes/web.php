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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/saveTask', [App\Http\Controllers\HomeController::class, 'store']);
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'editRoute']);
Route::view('show','show');
Route::patch('/edit/{id}/change/',[App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/home/{id}/delete/', [App\Http\Controllers\HomeController::class, 'destroy']);
Route::get('/getCategory',[App\Http\Controllers\HomeController::class, 'filterData']);
