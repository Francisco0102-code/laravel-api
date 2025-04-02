<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
/*public function register(Request $request)
/*{
    // Add your registration logic here
}*/

public function store(Request $request)
{
  /* $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
         'password' => 'required|string|min:8',
     ]);

     if($validated->fails()){
         return response()->json([
             "message" => "Erro de validação",
             "errors" => $validated->errors()
         ], 400);
     }
*/

// o if sgnifica se o email existe ele vai retornar uma mensagem se
// caso o emial for 
// existente
//tem o else tmb que se caso o if for false o else será executado

    if (
        User::where('email', $request->email)
        ->exists()
    ) {
        return response()->json([
            "message" => "Ja Existe uma conta com esse email "
        ], 400);
    }
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;

    $user->save();

    return response()->json([
        "User" => $user
    ]);
}
}
