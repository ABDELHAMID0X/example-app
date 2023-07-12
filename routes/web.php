<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
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

Route::get('/',function(){
    return view('welcome');
});
//


Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
});


//

Route::group(['middleware' => 'auth'], function() {
    Route::get('/book', [BookController::class, 'liste_book']);
    Route::get('/delete/{id}', [BookController::class, 'delete']);
    Route::post('/update/traitement', [BookController::class, 'update_traitement']);
    Route::get('/update/{id}', [BookController::class, 'update']);
    Route::get('/ajouter', [BookController::class, 'ajouter']);
    Route::post('/ajouter/traitement', [BookController::class, 'ajouter_traitement']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});




