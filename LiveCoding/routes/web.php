<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\TacheController;

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

Route::get( '/',[BriefController::class,'index']);
Route::get( '/brief/create',[BriefController::class,'create']);
Route::post( '/brief',[BriefController::class,'store']);
Route::get( '/brief/edit/{id}',[BriefController::class,'edit']);        //page modifier Brief
Route::post( '/brief/update/{id}',[BriefController::class,'update']);
Route::get( '/brief/delete/{id}',[BriefController::class,'destroy']);


Route::get( '/tache/{id}',[TacheController::class,'index']);
Route::get( '/tache/create/{id}',[TacheController::class,'create']);
Route::post( '/tache',[TacheController::class,'store']);
Route::get( '/tache/edit/{id}',[TacheController::class,'edit']);        //page modifier Tache
Route::post( '/tache/update/{id}',[TacheController::class,'update']);
Route::get( '/tache/delete/{id}}',[TacheController::class,'destroy']);

