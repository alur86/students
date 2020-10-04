<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Groups
Route::resource('groups', GroupsController::class);
Route::post('/groups.store', [App\Http\Controllers\GroupsController::class, 'store'])->name('groups.store');
Route::post('/groups.update/', [App\Http\Controllers\GroupsController::class, 'update'])->name('groups.update');

//Students
Route::get('/students', [App\Http\Controllers\StudentsController::class, 'index'])->name('students');
Route::get('/edit/{id}', [App\Http\Controllers\StudentsController::class, 'edit'])->name('edit');
Route::get('/new', [App\Http\Controllers\StudentsController::class, 'new'])->name('new');
Route::delete('/delete/{id}', [App\Http\Controllers\StudentsController::class, 'delete'])->name('delete');
Route::post('/update', [App\Http\Controllers\StudentsController::class, 'update'])->name('update');
Route::post('/create', [App\Http\Controllers\StudentsController::class, 'create'])->name('create');
Route::get('/search', [App\Http\Controllers\StudentsController::class, 'search'])->name('search');


