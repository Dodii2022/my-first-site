<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesztController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/teszt', function() {
    return view('teszt');

    
});


Route::get('/teszt', 'App\Http\Controllers\TesztController@teszt');

Route::get('/names', 'App\Http\Controllers\TesztController@names');

Route::get('/names/create/{name}', [TesztController::class, 'namesCreate']);

Route::get('/names/create/{family}/{name}', [TesztController::class, 'namesCreate'])->middleware('auth');
Route::get('/families/create/{name}', [TesztController::class, 'familyCreate'])->middleware('auth');

//Route::post('/names/delete', action: 'App\Http\Controllers\TesztController@deleteName');

Route::post('/names/delete', [TesztController::class, 'deleteName'])->middleware('auth');

Route::get('/names/manage/surname', [TesztController::class, 'manageSurname'])->middleware('auth');
Route::post('/names/manage/surname/delete', [TesztController::class, 'deleteSurname'])->middleware('auth');

Route::post('/names/manage/surname/new', [TesztController::class, 'newSurname'])->middleware('auth');

Route::post('/names/manage/name/new', [TesztController::class, 'newName'])->middleware('auth');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/names/manage/surname', [TesztController::class, 'manageSurname'])->middleware('auth');

Route::get('/profile', function(){
    return view('pages.profile');
})->middleware('auth');

Route::post('/profile/change-password', 'App\Http\Controllers\UserController@changePassword')->middleware('auth');