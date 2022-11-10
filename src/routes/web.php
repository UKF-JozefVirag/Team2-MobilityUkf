<?php

use App\Http\Controllers\Admin\DashboardController;
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

Route::group(['middleware' => 'auth'], function (){
   Route::group([
     'prefix' => 'admin',
     'middleware'=> 'is_admin',
     'as'=>'admin.',
   ], function (){
       Route::resource('vyzvy', VyzvyController::class);
       Route::resource('dashboard', DashboardController::class);

   });

   Route::group([
      'prefix' => 'ucastnik',
      'as' => 'ucastnik.',
   ], function (){
       Route::get('vyzvy', [\App\Http\Controllers\Ucastnik\VyzvyController::class, 'index'])
           ->name('vyzvy.index');
   });

});




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

