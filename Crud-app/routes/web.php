<?php

use App\Http\Controllers\ProfileController;
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


Route::get('/profiles', [ProfileController::class, 'index']);
Route::get('/profiles/create', [ProfileController::class, 'create']);
Route::post('/profiles', [ProfileController::class, 'store']);
Route::get('/profiles/{profile}', [ProfileController::class, 'show']);
Route::get('/profiles/{profile}/edit', [ProfileController::class, 'edit']);
Route::put('/profiles/{profile}', [ProfileController::class, 'update']);
Route::delete('/profiles/{profile}', [ProfileController::class, 'destroy']);
