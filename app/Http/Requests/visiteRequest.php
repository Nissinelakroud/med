<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisiteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_visite' => 'required|integer|unique:visite,id_visite',
            'date_visite' => 'required|date',
            'id' => 'required|exists:patient,id_patient',
            'id_utilisateur' => 'required|exists:utilisateur,id',
            'num_rdv' => 'required|exists:rendezvous,num_rdv',
        ];
    }
}
