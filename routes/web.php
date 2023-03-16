<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDosController;
use App\Http\Controllers\ApiToDosController;
use App\Http\Controllers\UserToDosController;

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
    return view('to-dos');
});

Route::get('/form', function () {
    return view('form');
});

Route::get('/list', [ToDosController::class, 'index'])->name('list');

Route::post('/form', [ToDosController::class, 'store'])->name('form');

Route::delete('/list/{id}', [ToDosController::class, 'destroy'])->name('todo-destroy');

Route::get('/list-api', [ApiToDosController::class, 'index'])->name('listApi');

Route::post('/form-api', [ApiToDosController::class, 'store'])->name('formApi');

Route::delete('/list-api/{id}', [ApiToDosController::class, 'destroy'])->name('todo-destroy-api');

Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/demo', [App\Http\Controllers\UserToDosController::class, 'index'])->name('demo');

Route::resource('usertodo', ' App\Http\Controllers\UserToDosController');

Route::get('/list-user', [UserToDosController::class, 'index'])->name('listUser');

Route::post('/form-user', [UserToDosController::class, 'store'])->name('formUser');

Route::delete('/list-user/{id}', [UserToDosController::class, 'destroy'])->name('todo-destroy-user');
