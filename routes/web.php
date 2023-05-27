<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActorController;

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

Route::get('/actormovies', [ActorController::class, 'index']);

Route::post('/filtered-actormovies', [ActorController::class, 'actormovies']);

Route::get('/search', [ActorController::class, 'search']);

Route::post('/searchresult', [ActorController::class, 'searchresult']);
