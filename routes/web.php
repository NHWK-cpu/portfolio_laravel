<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', [ImageController::class, 'create']);

Route::get('/login', [LoginController::class, 'showlogin']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/preview', fn() => view('preview', ['listitem' => [
    ['image' => 'VSC', 'name' => 'Visual Studio Code'], ['image' => 'G', 'name' => 'Git'], ['image' => 'GH', 'name' => 'Github'], ['image' => 'LV', 'name' => 'Laravel']
    ]]
));

Route::post('/login', [LoginController::class, 'confirm']);

Route::post('/upload', [ImageController::class, 'store']);
