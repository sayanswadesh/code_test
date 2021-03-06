<?php

use App\Http\Controllers\TestController;
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

Route::get('/', [TestController::class,'home'])->name('home');
Route::post('/get-date', [TestController::class,'get_date'])->name('get_date');


Route::get('/image-upload', [TestController::class,'image_upload'])->name('image_upload');
Route::post('/uploads', [TestController::class,'uploads'])->name('uploads');
