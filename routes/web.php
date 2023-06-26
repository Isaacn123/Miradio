<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AudioController;
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
Route::resource('/category', CategoryController::class)->middleware('auth');
Route::resource('/message',  MessageController::class)->middleware('auth');
Route::resource('/audios',  AudioController::class)->middleware('auth');
// / Categories
// features
// Route::get('changeStatus', 'CategoryController@changeStatus');
Route::get('changeStatus', [App\Http\Controllers\CategoryController::class, 'changeStatus'])->name('changeStatus');
Route::get('/categorys',[App\Http\Controllers\CategoryController::class, 'index'] )->name('categorys')->middleware('auth');
// Albums 
Route::get('/albums',[App\Http\Controllers\AlbumController::class, 'index'] )->name('albums')->middleware('auth');
Route::get('/alb_create',[App\Http\Controllers\AlbumController::class, 'create']  )->middleware('auth');
Route::get('/store',[App\Http\Controllers\AlbumController::class, 'store']  )->middleware('auth');
Route::post('albums/{album}/upload',[App\Http\Controllers\AlbumController::class, 'upload']  )->name('albums.upload')->middleware('auth');
Route::get('songs/{album}/create',[App\Http\Controllers\SongsController::class, 'create']  )->name('songs.create')->middleware('auth');
Route::post('songs/{album}/store',[App\Http\Controllers\SongsController::class, 'store']  )->name('songs.store')->middleware('auth');
Route::get('audios/{message}/create',[App\Http\Controllers\AudioController::class, 'create']  )->name('audios.create')->middleware('auth');
Route::post('audios/{message}/store',[App\Http\Controllers\AudioController::class, 'store']  )->name('audios.store')->middleware('auth');
Route::post('message/{message}/upload',[App\Http\Controllers\MessageController::class, 'upload']  )->name('message.upload')->middleware('auth');
// Route::post('message/{message}/create',[App\Http\Controllers\MessageController::class, 'create']  )->name('message.create')->middleware('auth');


// '<img src="https://res.cloudinary.com/dz3huxbpc/image/upload/v1687513756/vvol4mh1dlgzdr1og1he.jpg"  class='avatar rounded lg' alt='Message Image' height='200px' width='250px'>'; 


   