<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Vehicles;

class AuthController extends Controller
{
    public function store(Request $request) {

        try {

            $user = new User();
            if(User::where('email', $request->email)->exists()) {
                return response()->json([
                    "message" => "Email já cadastrado!"
                ], 400);
            }
            $user->name = $request->name;
            $user->email = $request->email;
        $user->type = $request->type;
        $user->telephone = $request->telephone;
        $user->password = $request->password;
        
        $user->save();
        
        
        if($request->type == 'driver'){
            $vehicle = new Vehicles();
            
            $vehicle->carbrand = $request->carbrand;
            $vehicle->carmodel = $request->carmodel;
            $vehicle->caryear = $request->caryear;
            $vehicle->carplate = $request->carplate;
            $vehicle->user_id = $user->id;
            
            $vehicle->save();
        }
        
        
        return response()->json([
            "user" => $user
        ]);
    } catch(Exception $e){
        return response()->json([
            "message" => "Erro ao cadastrar usuário!",
            "error" => $e->getMessage()
        ], 500);
    }
    }
}