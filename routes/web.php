<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;

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

Route::get('/', [LoginController::class,'showLogin'])->name('login');
Route::post('/', [LoginController::class,'loginUser'])->name('loginUser');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');

Route::get('/gallery', [PhotoController::class,'showGallery'])->name('gallery');
Route::get('/Admin/users', [UserController::class,'showUsers'])->name('users');

// Album
Route::get('/Album', [AlbumController::class,'showAlbum'])->name('album');
Route::post('/add/Album', [AlbumController::class,'addAlbum'])->name('addAlbum');
Route::get('/manage-album/{album_id}', [AlbumController::class,'showManageAlbum'])->name('manage-album');
Route::post('/upload-photo/{album_id}', [PhotoController::class,'uploadPhoto'])->name('uploadPhoto');


Route::get('/register-page', [RegisterController::class,'showRegister'])->name('register');
Route::post('/register-user', [RegisterController::class,'registerUser'])->name('registerUser');
