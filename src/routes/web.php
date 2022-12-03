<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InstitutionsController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\UsersController;
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
Route::get('/search', 'App\Http\Controllers\VyzvyController@search')->name('search');
Route::resource('/sprava', VyzvyController::class);

Route::group(['middleware' => 'auth'], function (){
   Route::group([
     'prefix' => 'admin',
     'middleware'=> 'is_admin',
     'as'=>'admin.',
   ], function (){
       Route::resource('vyzvy', VyzvyController::class);
       Route::resource('/dashboard', DashboardController::class);
       Route::resource('/institutions', InstitutionsController::class);
       Route::resource('/users', UsersController::class);
       Route::resource('/messages', MessagesController::class);

   });

    Route::group([
        'prefix' => 'referent',
        'as' => 'referent.',
    ], function (){
        Route::resource('/spravy', \App\Http\Controllers\Referent\MessagesController::class);
        Route::resource('/institucie', \App\Http\Controllers\Referent\InstitutionsController::class);
        Route::resource('/vyzvy', \App\Http\Controllers\Referent\VyzvyController::class);
    });

   Route::group([
      'prefix' => 'ucastnik',
      'as' => 'ucastnik.',
   ], function (){
       Route::get('vyzvy', [\App\Http\Controllers\Ucastnik\VyzvyController::class, 'index'])
           ->name('vyzvy.index');
       Route::resource('sprava', \App\Http\Controllers\Ucastnik\MessagesController::class);
   });

});

Route::resource('/vyzvy', \App\Http\Controllers\VyzvyController::class);

Route::resource('/messages', \App\Http\Controllers\MessagesController::class);


Route::get('/anotherMobilities', function (){
    return view('anotherMobilities.index');
});

Route::resource('/erasmus', \App\Http\Controllers\ErasmusPlusController::class);

Route::get('/anotherMobilities', function (){
    return view('anotherMobilities.index');
});

//Route::get('/messages', function (){
//    return view('messages.index');
//});

Route::get('/messages/detail', function (){
    return view('messages.detail');
});

Route::get('/ucastnik/sprava', function (){
    return view('ucastnik.sprava');
});

Route::get('/ucastnik', function (){
    return view('ucastnik.index');
});
