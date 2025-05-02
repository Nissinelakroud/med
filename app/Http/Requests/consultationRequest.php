<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ConsultationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'motif' => 'string',
            'temperature' => 'nullable|numeric|min:30|max:45',
            'symptomes' => 'nullable|string|max:1000',
            'tension_arterielle_systolique' => 'nullable|numeric|min:50|max:250',
            'tension_arterielle_diastolique' => 'nullable|numeric|min:30|max:150',
            'saturation_oxygene' => 'nullable|numeric|min:50|max:100',
            'frequence_cardiaque' => 'nullable|numeric|min:30|max:200',
            'poids' => 'nullable|numeric|min:1|max:300',
            'taille' => 'nullable|numeric|min:30|max:250',
            'diagnostic_principal' => 'nullable|string|max:1000',
            'traitement' => 'nullable|string|max:1000',
           
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
            'motif.string' => 'Le motif est obligatoire.',
            'temperature.numeric' => 'La température doit être un nombre.',
            'tension_arterielle_systolique.numeric' => 'La tension systolique doit être un nombre.',
            'tension_arterielle_diastolique.numeric' => 'La tension diastolique doit être un nombre.',
            'saturation_oxygene.numeric' => 'La saturation en oxygène doit être un nombre.',
            'frequence_cardiaque.numeric' => 'La fréquence cardiaque doit être un nombre.',
           
            
        ];
    }
}
