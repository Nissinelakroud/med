<?php 
namespace App\Http\Controllers;

use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash; 
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'name' => 'required|string',
            'email' => 'required|string|email|max:40|unique:users',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $hashedPassword = Hash::make($request->password);

       
        $user = User::create([
            'id' => $request->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $hashedPassword, 
        ]);

        
        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'Utilisateur enregistré avec succès',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json(['error' => 'Utilisateur non trouvé'], 404);
        }

       
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Mot de passe incorrect'], 401);
        }

        
        try {
            $token = JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Échec de la création du token'], 500);
        }

        return $this->createNewToken($token);
    }

    public function createNewToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'user' => JWTAuth::user()
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Déconnexion réussie']);
    }
}
