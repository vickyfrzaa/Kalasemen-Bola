<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\ClubController;

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

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/add', [PertandinganController::class, 'index']);
Route::post('/add', [PertandinganController::class, 'store'])->name('store');
Route::get('/addClub', [ClubController::class, 'index'])->name('index');
Route::post('/addClub', [ClubController::class, 'store'])->name('store');
