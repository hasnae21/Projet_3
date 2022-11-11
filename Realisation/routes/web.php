<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PromotionController;
use App\Http\Controllers\ApprenantController;
use App\Http\Controllers\BriefController;
use App\Http\Controllers\TacheController;
use App\Http\Controllers\Briefs_apprenantController;

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

//route promotion
Route::get( '/', [PromotionController::class, 'index']);
Route::get( '/promotion/create', [PromotionController::class, 'create']);
Route::post( '/promotion', [PromotionController::class, "store"]);
Route::get( '/promotion/edit/{id}', [PromotionController::class, "edit"]);
Route::post( '/promotion/update/{id}', [PromotionController::class, "update"]);
Route::get( '/promotion/delete/{id}', [PromotionController::class, "destroy"]);
Route::get( '/promotion/search',[PromotionController::class,'search']);

//route apprenant
Route::get( '/apprenant',[ApprenantController::class,'index']);
Route::get( '/apprenant/create',[ApprenantController::class,'create']);
Route::post( '/apprenant',[ApprenantController::class,'store']);
// Route::get( '/apprenant/',[ApprenantController::class,'edit']);           //page modifier apprenant
// Route::post( '/apprenant/',[ApprenantController::class,'update']);
// Route::get( '/apprenant/',[ApprenantController::class,'destroy']);
Route::get( '/apprenant/search',[ApprenantController::class,'search']);

//route brief
Route::get( '/brief',[BriefController::class,'index']);
Route::get( '/brief/create',[BriefController::class,'create']);
Route::post( '/brief',[BriefController::class,'store']);
Route::get( '/brief/edit/{id}',[BriefController::class,'edit']);
Route::post( '/brief/update/{id}',[BriefController::class,'update']);
Route::get( '/brief/delete/{id}',[BriefController::class,'destroy']);
Route::get( '/brief/search',[BriefController::class,'search']);

//route tache
Route::get( '/tache',[TacheController::class,'index']);
Route::get( '/tache/ceate',[TacheController::class,'create']);
Route::post( '/tache',[TacheController::class,'store']);
// Route::get( '/tache/ ',[TacheController::class,'edit']);               //page modifier Tache
// Route::post( '/tache/ ',[TacheController::class,'update']);
// Route::get( '/tache/ ',[TacheController::class,'destroy']);
Route::get( '/tache/search',[TacheController::class,'search']);

//route assign
Route::resource( 'assign', Briefs_apprenantController::class);
