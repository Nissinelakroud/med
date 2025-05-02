<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Http\Exceptions\HttpResponseException;

class CertificatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'num_certif' => 'required|string|max:50|unique:certificats,num_certif,' . $this->certificat,
            'contenu' => 'required|string|max:2000',
            'id_visite' => 'required|exists:visites,id',
        ];
    }

    public function messages()
    {
        return [
            'num_certif.required' => 'Le numéro du certificat est obligatoire.',
            'num_certif.unique' => 'Ce numéro de certificat est déjà utilisé.',
            'contenu.required' => 'Le contenu du certificat est obligatoire.',
            'id_visite.required' => 'L\'identifiant de la visite est obligatoire.',
            'id_visite.exists' => 'La visite associée n\'existe pas.',
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
}
