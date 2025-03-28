<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use  App\Models\User;


Route::get( '/user', function (Request $request) {
    return response ()->json(['message' => 'A vontade de parar e grande mas  nao posso']);
});
//salvar no db "post" server para pegar algo do db ou por lá


Route::post( '/register', function(Request $request) {
$user = new User();
$user->name=$request->name;
$user->email=$request->email;
$user->password=$request->password;

return response ()->json ([
        "user" => $user
    ]);
    });