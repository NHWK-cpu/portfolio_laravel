<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ToolController;

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/project', [ProjectController::class, 'form']);
Route::post('/project', [ProjectController::class, 'store']);
Route::get('/del-project/{id}', [ProjectController::class, 'destroy']);
Route::get('/edit-project/{id}', [ProjectController::class, 'showedit']);
Route::post('/edit-project', [ProjectController::class, 'edit']);

Route::get('/tools', [ToolController::class, 'form']);
Route::post('/tools', [ToolController::class, 'store']);
Route::get('/del-tool/{id}', [ToolController::class, 'destroy']);
Route::get('/edit-tool/{id}', [ToolController::class, 'showedit']);
Route::post('/edit-tool', [ToolController::class, 'edit']);

Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store']);

Route::get('/login', [LoginController::class, 'showlogin']);

Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/login', [LoginController::class, 'confirm']);

Route::get('/', function() { 
    session_start();
    $verif = session(['verif'=>$_SESSION]);
    return view('preview', compact('verif'));
});
