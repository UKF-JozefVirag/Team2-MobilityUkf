<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\AnotherMobilitiesController;
use App\Http\Controllers\ErasmusController;

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
    return redirect(route('mainPage.index'));
});

Route::resource('mainPage', MainPageController::class);
Route::resource('messages', MessagesController::class);
Route::resource('erasmus', ErasmusController::class);
Route::resource('anotherMobilities', AnotherMobilitiesController::class);
