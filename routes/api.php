<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\LoginController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

Route::post('register', [UserController::class, 'store']);
Route::get('users', [UserController::class, 'index']);


Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks/store', [TaskController::class, 'store']);

