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
            'motif' => 'string|nullable ',
            'temperature' => 'nullable|numeric|max:45',
            'symptomes' => 'nullable|string|max:1000',
            'tension_arterielle_systolique' => 'nullable|numeric|max:250',
            'tension_arterielle_diastolique' => 'nullable|numeric|max:150',
            'saturation_oxygene' => 'nullable|numeric|max:100',
            'frequence_cardiaque' => 'nullable|numeric|max:200',
            'poids' => 'nullable|numeric|max:300',
            'taille' => 'nullable|numeric|max:250',
            'diagnostic_principal' => 'nullable|string|max:1000',
            'traitement' => 'nullable|string|max:1000',
            'id_patient' => 'exists:patients,id_patient',
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
