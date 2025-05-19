<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendezvousRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'num_rdv' => 'required|integer|unique:rendezvous,num_rdv',
        
            'date_rdv' => 'required|date',
            'motif' => 'required|string|max:255',
            'id_patient' => 'required|exists:patients,id',
        ];
    }
}
