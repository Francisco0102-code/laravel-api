<?php


use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\AuthController;


Route::get( '/user', [AuthController::class , 'user']);
//salvar no db "post" server para pegar algo do db ou por lá


Route::post( '/register', [AuthController::class , 'store']);
/*Route::post( '/login', AuthController::class . '@login');
Route::get( '/user', AuthController::class . '@user');*/