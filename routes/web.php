<?php

use App\Controllers\MainController;
use App\Controllers\UserController;
use Petrenko\Framework\Route;

Route::add('/', [MainController::class, 'index']);


Route::add('/login', [UserController::class, 'login']);
Route::add('/register', [UserController::class, 'register']);

Route::add('/user', [UserController::class, 'index']);

//Route::add('/user/create', [UserController::class, 'create']);
Route::add('/user/update', [UserController::class, 'update']);
Route::add('/user/delete', [UserController::class, 'delete']);

Route::add('/list', [\App\Controllers\ArticleController::class, 'list']);
