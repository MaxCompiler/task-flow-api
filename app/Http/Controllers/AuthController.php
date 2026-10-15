<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' =>'required|string|email|max:255|unique:users',
            'password'=>'required|string|max:255'
        ]);

        $user = User::create([
            'name'=> $validated['name'],
            'email'=> $validated['email'],
            'password'=> Hash::make($validated['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Usuario registrado exitosamente',
            'access_token'=> $token,
            'token_type'=> 'Bearer',
            'user' => $user,
        ],201);
    }

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('email',$request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)){
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas son incorrectas.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' =>'Inicio de sesión exitoso',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user'=> $user
        ]);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Sesión cerrada correctamente'
        ]);
    }
}
