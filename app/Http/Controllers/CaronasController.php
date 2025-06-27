<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caronas;
use Exception;

class CaronasController extends Controller
{
    // Criar uma nova carona (Create)
    public function store(Request $request)
    {
        try {
            $carona = Caronas::create($request->all());

            return response()->json([
                "message" => "Carona criada com sucesso!",
                "carona" => $carona
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao criar carona!",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    // Listar todas as caronas (Read)
    public function index()
    {
        try {
            $caronas = Caronas::all();

            return response()->json($caronas);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao listar caronas!",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    // Mostrar uma carona específica (Read)
    public function show($id)
    {
        try {
            $carona = Caronas::findOrFail($id);

            return response()->json($carona);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Carona não encontrada!",
                "error" => $e->getMessage()
            ], 404);
        }
    }

    // Atualizar uma carona (Update)
    public function update(Request $request, $id)
    {
        try {
            $carona = Caronas::findOrFail($id);
            $carona->update($request->all());

            return response()->json([
                "message" => "Carona atualizada com sucesso!",
                "carona" => $carona
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao atualizar carona!",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    // Deletar uma carona (Delete)
    public function destroy($id)
    {
        try {
            $carona = Caronas::findOrFail($id);
            $carona->delete();

            return response()->json([
                "message" => "Carona deletada com sucesso!"
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Erro ao deletar carona!",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}