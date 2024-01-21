<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/workers', [\App\Http\Controllers\WorkerController::class, 'index'])->name('worker.index');

Route::post('/workers', [\App\Http\Controllers\WorkerController::class, 'store'])->name('worker.store');

Route::get('/workers/create', [\App\Http\Controllers\WorkerController::class, 'create'])->name('worker.create');

Route::get('/workers/update', [\App\Http\Controllers\WorkerController::class, 'update'])->name('worker.update');

Route::get('/workers/delete', [\App\Http\Controllers\WorkerController::class, 'delete'])->name('worker.delete');

Route::get('/workers/{worker}', [\App\Http\Controllers\WorkerController::class, 'show'])->name('worker.show');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// за счёт такого where перехватим любой запрос с любой вложенностью
Route::get('/{page}', App\Http\Controllers\IndexController::class)->where('page', '.*');
