<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Http\Exceptions\HttpResponseException;

class RoleRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser tous les utilisateurs
    }

    public function rules()
    {
        return [
            'role' => 'required|string|max:255', // Le rôle doit être une chaîne non vide, avec un maximum de 255 caractères
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validation',
            'errorList' => $validator->errors(),
        ]));
    }

    public function messages()
    {
        return [
            'role.required' => "Le rôle doit être fourni",
            'role.string' => "Le rôle doit être une chaîne de caractères",
            'role.max' => "Le rôle ne peut pas dépasser 255 caractères",
        ];
    }
}
