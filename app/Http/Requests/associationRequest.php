<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class AssociationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_visite' => 'required|exists:visites,id_visite', // La visite doit exister
            'id_cmpt' => 'required|exists:compte_rendus,id_cmpt', // Le compte rendu doit exister
        ];
    }

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
            'id_visite.required' => 'La visite est requise.',
            'id_visite.exists' => 'La visite spécifiée n\'existe pas.',
            'id_cmpt.required' => 'Le compte rendu est requis.',
            'id_cmpt.exists' => 'Le compte rendu spécifié n\'existe pas.',
        ];
    }
}
