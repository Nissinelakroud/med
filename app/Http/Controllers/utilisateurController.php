<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Exception;

class UtilisateurController extends Controller
{
    public function index()
    {
        try {
            // Supprimé la relation 'role'
            $utilisateurs = User::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Liste des utilisateurs",
                'data' => $utilisateurs
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $utilisateur = new User();
            $utilisateur->nom = $request->nom;
            $utilisateur->email = $request->email;
            $utilisateur->mot_de_passe = Hash::make($request->mot_de_passe);
$utilisateur->role = $request->role ?? 'medecin'; // valeur par défaut 
            $utilisateur->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Utilisateur créé avec succès",
                'data' => $utilisateur
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $utilisateur = User::find($id);

        if (!$utilisateur) {
            return response()->json(['message' => 'Utilisateur non trouvé'], 404);
        }

        return response()->json($utilisateur);
    }

    public function update(Request $request, $id)
    {
        try {
            $utilisateur = User::findOrFail($id);
            $utilisateur->nom = $request->nom;
            $utilisateur->email = $request->email;
 $utilisateur->role = $request->role;
            if ($request->mot_de_passe) {
                $utilisateur->mot_de_passe = Hash::make($request->mot_de_passe);
            }

            $utilisateur->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Utilisateur modifié avec succès",
                'data' => $utilisateur
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function delete(User $utilisateur)
    {
        try {
            $utilisateur->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Utilisateur supprimé avec succès",
                'data' => $utilisateur
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
