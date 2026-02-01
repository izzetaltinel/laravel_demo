<?php


use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;
use App\Http\Controllers\UserController;

Route::get('/greeting', function () {
    return 'Hello World';
});


Route::get('/user', [UserController::class, 'index']);
