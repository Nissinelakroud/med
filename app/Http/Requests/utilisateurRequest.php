<?php 
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UtilisateurRequest extends FormRequest
{
    public function rules()
    {
        return [
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:utilisateurs,email',
            'mot_de_passe' => 'required|string|min:6|confirmed', // Confirmation du mot de passe
            'role_id' => 'exists:roles,id', // Validation de la clé étrangère du rôle
        ];
    }
}
