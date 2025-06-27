<?php


use Illuminate\Support\Facades\Route;
use  App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CaronasController;


Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
      
//salvar no db "post" server para pegar algo do db ou por lá


Route::post( '/register', [AuthController::class , 'store']);
/*Route::post( '/login', AuthController::class . '@login');
Route::get( '/user', AuthController::class . '@user');*/

// Rotas para o CRUD de caronas
Route::get('/caronas', [CaronasController::class, 'index']); // Listar todas as caronas
Route::get('/caronas/{id}', [CaronasController::class, 'show']); // Mostrar uma carona específica
Route::post('/caronas', [CaronasController::class, 'store']); // Criar uma nova carona
Route::put('/caronas/{id}', [CaronasController::class, 'update']); // Atualizar uma carona
Route::delete('/caronas/{id}', [CaronasController::class, 'destroy']); // Deletar uma carona