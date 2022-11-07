<?php

use App\Http\Controllers\VyzvyController;
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

require __DIR__.'/auth.php';

Route::resource('/', VyzvyController::class);

Route::get('/anotherMobilities', function (){
    return view('anotherMobilities.index');
});

Route::get('/erasmus', function (){
    return view('erasmus.index');
});

Route::get('/anotherMobilities', function (){
    return view('anotherMobilities.index');
});

Route::get('/messages', function (){
    return view('messages.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

