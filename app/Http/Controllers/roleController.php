<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    public function index(){
        return 'Liste des rôles';
    }

   
    public function store(Request $request){
        try{
            $role = new Role();
            $role->id_role = $request->id_role;  
            $role->role = $request->role; 
            
            $role->save();  

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

    
    public function update(Request $request, Role $role){
        try{
            $role->role = $request->role;  
            $role->save();  

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

    public function delete(Role $role){
        try{
            $role->delete();  

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
