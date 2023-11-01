<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToDoListController;

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
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->middleware('auth')->name('user.profile');

// To-do list routes
Route::get('/todolist', [App\Http\Controllers\ToDoListController::class, 'index'])->name('user.todolist.index');
Route::get('/todolist/create', [App\Http\Controllers\ToDoListController::class, 'create'])->name('user.todolist.create');
Route::post('/todolist', [App\Http\Controllers\ToDoListController::class, 'store']);
Route::get('/todolist/{id}/edit', [App\Http\Controllers\ToDoListController::class, 'edit'])->name('user.todolist.edit');
Route::get('/todolist/{id}/delete', [App\Http\Controllers\ToDoListController::class, 'delete'])->name('user.todolist.delete');
Route::get('/todolist/{id}/update', [App\Http\Controllers\ToDoListController::class, 'update'])->name('user.todolist.update');

// Route::put('/todolist/{todo}', [App\Http\Controller\ToDoListController::class, 'update']);
