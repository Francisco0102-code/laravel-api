<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }


    public function index()
{
    // Busca todos os usuários do banco de dados
    $users = User::select('id', 'name', 'email', 'created_at')->get();

    // Retorna os usuários em formato JSON
    return response()->json($users, 200);
}

    public function show($id)
    {
        // Busca o usuário pelo ID
        $user = User::find($id);

        // Verifica se o usuário foi encontrado
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        // Retorna o usuário em formato JSON
        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
        // Busca o usuário pelo ID
        $user = User::find($id);

        // Verifica se o usuário foi encontrado
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        // Atualiza os dados do usuário
        $user->update($request->all());

        // Retorna o usuário atualizado em formato JSON
        return response()->json($user, 200);
    }

    public function destroy($id)
    {
        // Busca o usuário pelo ID
        $user = User::find($id);

        // Verifica se o usuário foi encontrado
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        // Deleta o usuário
        $user->delete();

        // Retorna uma resposta de sucesso
        return response()->json(['message' => 'Usuário deletado com sucesso'], 200);
    }
}
