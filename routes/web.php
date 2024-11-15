<?php

use App\Http\Controllers\TaskManagerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MailController;
use App\Models\TaskManager;
use Illuminate\Support\Facades\Route;

Route::get('/',[TaskManagerController::class,'index'])->name('index');
Route::post('/createTask',[TaskManagerController::class,'createTask'])->name('createTask');
Route::get('/edit/{id}',[TaskManagerController::class,'edit'])->name('edit');
Route::post('/update/{id}',[TaskManagerController::class,'update'])->name('update');
Route::get('/delete/{id}',[TaskManagerController::class,'delete'])->name('delete');
Route::get('/status/{id}',[TaskManagerController::class,'status'])->name('status');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/check',[UserController::class,'check'])->name('check');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/save',[UserController::class,'save'])->name('save');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/fileupload',[TaskManagerController::class,'fileupload']);
Route::post('/savefile',[TaskManagerController::class,'savefile']);

Route::get('/email',[MailController::class,'email']);