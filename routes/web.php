<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongsController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('/albums', AlbumController::class)->middleware('auth');
Route::resource('/songs', SongsController::class)->middleware('auth');
Route::get('/albums',[App\Http\Controllers\AlbumController::class, 'index'] )->name('albums')->middleware('auth');
Route::get('/alb_create',[App\Http\Controllers\AlbumController::class, 'create']  )->middleware('auth');
Route::get('/store',[App\Http\Controllers\AlbumController::class, 'store']  )->middleware('auth');
Route::post('albums/{album}/upload',[App\Http\Controllers\AlbumController::class, 'upload']  )->name('albums.upload')->middleware('auth');
Route::get('songs/{album}/create',[App\Http\Controllers\SongsController::class, 'create']  )->name('songs.create')->middleware('auth');
Route::post('songs/{album}/store',[App\Http\Controllers\SongsController::class, 'store']  )->name('songs.store')->middleware('auth');