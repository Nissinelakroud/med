<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator; 
use Illuminate\Http\Exceptions\HttpResponseException;
class PatientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nom_patient' => 'required|string|max:25',
            'prenom_patient' => 'required|string|max:255',
            'CIN' => 'required|string|max:20|unique:patients,CIN,' ,
            'email' => 'nullable|email',
            'date_naissance' => 'date',
            'telephone' => 'nullable|string|max:20',
            'assurance' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'poids' => 'nullable|numeric|min:0|max:500',
        ];
    } 
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success'=>false,
            'error'=>true,
            'message'=> 'Erreur de validation',
            'errorList'=>$validator->errors(),

        ]));
    }
    public function messages()
    {
        return[
            'nom_patient.required'=>"le nom doit être fourni",
            'prenom_patient.required'=>"le prenom doit être fourni",
            'date_naissance.required'=>"la date d\'affectation doit être fourni",
           
        ];
    }
}
