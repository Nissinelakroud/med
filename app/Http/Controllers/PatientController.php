<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Exception;

class PatientController extends Controller
{
    public function index()
    {
        try {
            $patients = Patient::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Liste des patients",
                'data' => $patients
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $patient = new Patient();
            $patient->nom_patient = $request->nom_patient;
            $patient->prenom_patient = $request->prenom_patient;
            $patient->CIN = $request->CIN;
            $patient->email = $request->email;
            $patient->date_naissance = $request->date_naissance;
            $patient->telephone = $request->telephone;
            $patient->assurance = $request->assurance;
            $patient->adresse = $request->adresse;
            $patient->poids = $request->poids;

            $patient->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Patient créé avec succès",
                'data' => $patient
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function show($id)
    {
        $patient = Patient::find($id);

        if (!$patient) {
            return response()->json(['message' => 'Patient non trouvé'], 404);
        }

        return response()->json($patient);
    }

    public function update(Request $request, $id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->nom_patient = $request->nom_patient;
            $patient->prenom_patient = $request->prenom_patient;
            $patient->CIN = $request->CIN;
            $patient->email = $request->email;
            $patient->date_naissance = $request->date_naissance;
            $patient->telephone = $request->telephone;
            $patient->assurance = $request->assurance;
            $patient->adresse = $request->adresse;
            $patient->poids = $request->poids;

            $patient->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Patient modifié avec succès",
                'data' => $patient
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function delete(Patient $patient)
    {
        try {
            $patient->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Patient supprimé avec succès",
                'data' => $patient
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
