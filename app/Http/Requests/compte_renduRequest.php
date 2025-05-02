<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Http\Exceptions\HttpResponseException;

class Compte_RenduRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Autoriser la requête
    }

    public function rules()
    {
        return [
            'text' => 'required|string|max:1000', // Validation du champ text
        ];
    }

    // Gestion des erreurs de validation
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Erreur de validation',
            'errors' => $validator->errors(),
        ]));
    }

    public function messages()
    {
        return [
            'text.required' => "Le texte du compte rendu doit être fourni.",
            'text.string' => "Le texte du compte rendu doit être une chaîne de caractères.",
            'text.max' => "Le texte du compte rendu ne doit pas dépasser 1000 caractères.",
        ];
    }
}
