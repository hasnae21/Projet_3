<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PromotionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


//route promotion

Route::get('/', [PromotionController::class, 'index']);

Route::get('/add_form', [PromotionController::class, 'create']);
Route::post('/add', [PromotionController::class, "store"]);

Route::get('/edit_form/{id}', [PromotionController::class, "edit"]);   //page de liste des promo
Route::post('/update/{id}', [PromotionController::class, "update"]);

Route::get('/delete/{id}', [PromotionController::class, "destroy"]);

Route::get('search',[PromotionController::class,'search']);



//route ampprenant

Route::get('/add_forms/{id}',[ApprenantController::class,'create']);
Route::post('/adds',[ApprenantController::class,'store']);

Route::get('/edit_forms/{id}',[ApprenantController::class,'edit']);   //page modifier apprenant
Route::post('/updates/{id}',[ApprenantController::class,'update']);

Route::get('/deletes/{id}',[ApprenantController::class,'destroy']);

Route::get('searchs',[ApprenantController::class,'searchs']);



