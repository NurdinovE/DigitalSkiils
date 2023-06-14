<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'home']);

Route::get('/profile', [MainController::class, 'profile'])->name('profile')->middleware(['auth']);

Route::post('/profile/edit', [MainController::class, 'editUserInfo'])->name('editUserInfo');

Route::post('profile/upload', [ImageController::class, 'upload'])->name('upload');



require __DIR__.'/auth.php';
