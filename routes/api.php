<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RadioController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\SettingController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('albumsdata',[AlbumController::class, 'fetch']);

Route::get('categories',[CategoryController::class, 'fetch']);

Route::get('messages',[MessageController::class, 'fetch_messages']);

// Route::get('/messages/{id}', [MessageController::class, 'single_message']);
Route::get('/category/{id}', [CategoryController::class, 'single_category']); 
// Route::get('categories/{id}/message',[CategoryController::class, 'single_message']);
Route::get('categories/{id}/message',[MessageController::class, 'single_message']);

Route::get('radios',[RadioController::class, 'recentRadios']);
Route::get('home',[RadioController::class, 'homeRadios']);
Route::get('social',[SocialController::class, 'getsocials']);
Route::get('settings',[SettingController::class, 'getsettings']);
Route::get('category_detail/{id}',[CategoryController::class, 'category_details']);






