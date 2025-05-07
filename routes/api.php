<?php


use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
      
//salvar no db "post" server para pegar algo do db ou por lá


Route::post( '/register', [AuthController::class , 'store']);
/*Route::post( '/login', AuthController::class . '@login');
Route::get( '/user', AuthController::class . '@user');*/