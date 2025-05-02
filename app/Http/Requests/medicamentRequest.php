<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Http\Exceptions\HttpResponseException;

class MedicamentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'num_med' => 'required|string|max:50|unique:medicaments,num_med,' . $this->medicament,
            'nom_med' => 'required|string|max:255',
            'therapeutique' => 'nullable|string|max:255',
            'unite' => 'nullable|string|max:50',
            'forme_galenique' => 'nullable|string|max:100',
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
            'num_med.required' => 'Le numéro du médicament est obligatoire.',
            'num_med.unique' => 'Ce numéro de médicament est déjà utilisé.',
            'nom_med.required' => 'Le nom du médicament est requis.',
        ];
    }
}
