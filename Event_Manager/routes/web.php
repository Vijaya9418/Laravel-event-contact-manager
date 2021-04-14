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
use App\Http\Controllers\fetchdata;

Route::get('/', [fetchdata::class, 'index']);
Route::get('/groups', [fetchdata::class, 'group']);
Route::get('/events', [fetchdata::class, 'events']);
