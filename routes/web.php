<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MulitpleImagesController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\FacebookController;
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

// Route::get('/image', [MulitpleImagesController::class, 'index'])->name('images.index');
// Route::get('/add-images', [MulitpleImagesController::class, 'create'])->name('images.create');
// Route::post('/upload-images', [MulitpleImagesController::class, 'upload'])->name('images.upload');

Route::get('/file', [FilesController::class, 'createFile'])->name('files.create');
Route::post('/upload-file', [FilesController::class, 'uploadFile'])->name('files.upload');
Route::get('/file-list', [FilesController::class, 'showFile'])->name('files.show');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Facebook Login url
// Route::prefix('facebook')->name('facebook.')->group(function(){
//     Route::get('/auth',[FacebookController::class, 'loginUsingFacebook'])->name('fblogin');
//     Route::get('callback',[FacebookController::class, 'callbackFromFacebook'])->name('callback');
    
// });

Route::get('auth/facebook', [FacebookController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookController::class, 'handleCallback']);
