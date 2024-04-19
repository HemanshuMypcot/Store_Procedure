<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', [SpController::class, 'insertRecord']);
Route::get('/insert',[SpController::class,'show']);
Route::post('/insert',[SpController::class,'insertRecord']);
Route::get('/update/{id}',[SpController::class,'edit']);
Route::post('/update',[SpController::class,'update']);
Route::get('/delete/{id}', [SpController::class, 'delete']);