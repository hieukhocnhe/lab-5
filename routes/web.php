<?php

use App\Http\Controllers\LoginController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;


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

// Route::get('/', function () {
//     return view('layout');
// });

Route::middleware(AdminMiddleware::class)->group(function(){

    Route::get('/', [MovieController::class, 'index'])->name('movies.index');

    Route::get('movies/create', [MovieController::class, 'create'])->name('movies.create');

    Route::post('movies/store', [MovieController::class, 'store'])->name('movies.store');

    Route::get('movies/{id}', [MovieController::class, 'show'])->name('movies.show');

    Route::get('movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');

    Route::put('movies/{id}', [MovieController::class, 'update'])->name('movies.update');

    Route::delete('movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

});

Route::get('/login',[LoginController::class, 'login'])->name('login');

Route::post('/login',[LoginController::class, 'postLogin'])->name('postLogin');

Route::get('/logout',[LoginController::class, 'logout'])->name('logout');

Route::get('/register',[LoginController::class, 'register'])->name('register');

Route::post('/register',[LoginController::class, 'postRegister'])->name('postRegister');
