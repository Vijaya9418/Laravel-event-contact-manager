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
use App\Http\Controllers\login;
use App\Http\Controllers\logout;
use App\Http\Controllers\register;
use App\Http\Controllers\adddata;

use App\Http\Controllers\invite;
use App\Http\Controllers\eventRSVP;
Route::get('/', [fetchdata::class, 'index']);
Route::get('/groups', [fetchdata::class, 'group']);
Route::get('/events', [fetchdata::class, 'events']);
Route::get('/explore', [fetchdata::class, 'explore']);
Route::get('/login', [login::class, 'login']);
Route::get('/logout', [logout::class, 'logout']);
Route::post('/login', [login::class, 'verifylogin']);
Route::get('/register', [register::class, 'register']);
Route::post('/registerdata', [register::class, 'reginsert']);

Route::post('/creategroup', [adddata::class, 'addgroup']);

Route::post('/createevent', [adddata::class, 'addevent']);

Route::post('/postdata', [adddata::class, 'addpost']);
Route::post('/rsvpedit', [eventRSVP::class, 'edit']);
Route::post('/rsvpjoin', [eventRSVP::class, 'join']);
Route::post('/rsvpdelete', [eventRSVP::class, 'delete']);
Route::post('/rsvpignore', [eventRSVP::class, 'ignore']);
Route::post('/invite', [invite::class, 'invitemem']);
Route::post('/postfetch', [invite::class, 'fetch']);
Route::post('/deletepost', [invite::class, 'delete']);
Route::post('/invitepeople', [invite::class, 'peopleadd']);
Route::post('/uploads', [invite::class, 'imageupload']);
Route::post('/imgupdate', [invite::class, 'imgupdate']);
Route::post('/imgupdated', [invite::class, 'imgupdated']);
Route::post('/imgupdateevent', [invite::class, 'imgupdatee']);


