<?php


use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/greeting', function () {
    return 'Hello World';
});


Route::get('/user/performance-test', [UserController::class, 'performanceTest']);
Route::get('/user/print-users', [UserController::class, 'printUsers']);

