<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Liste des rôles (exemple)
    public function index(){
        return 'Liste des rôles';
    }

    // Ajouter un rôle
    public function store(Request $request){
        try{
            $role = new Role();
            $role->id_role = $request->id_role;  // Assigner l'id_role si nécessaire
            $role->role = $request->role;  // Assigner le rôle
            
            $role->save();  // Sauvegarder le rôle dans la base de données

            return response()->json([
                'status_code' => 201,
                'status_message' => "Le rôle a été ajouté",
                'data' => $role
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Mettre à jour un rôle
    public function update(Request $request, Role $role){
        try{
            $role->role = $request->role;  // Mettre à jour le champ role
            $role->save();  // Sauvegarder les modifications

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le rôle a été modifié",
                'data' => $role
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Supprimer un rôle
    public function delete(Role $role){
        try{
            $role->delete();  // Supprimer le rôle

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le rôle a été supprimé",
                'data' => $role
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
