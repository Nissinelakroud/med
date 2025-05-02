<?php

namespace App\Http\Controllers;

use App\Models\visite;
use Illuminate\Http\Request;
use Exception;

class VisiteController extends Controller
{
    // Liste de toutes les visites
    public function index()
    {
        $visites = visite::all();

        return response()->json([
            'status_code' => 200,
            'data' => $visites
        ]);
    }

    // Ajouter une visite
    public function store(Request $request)
    {
        $request->validate([
            'id_visite' => 'required|integer|unique:visite,id_visite',
            'date_visite' => 'required|date',
            'id_patient' => 'required|exists:patients,id',
            'id_utilisateur' => 'required|exists:utilisateurs,id',
            'num_rdv' => 'required|exists:rendezvous,num_rdv',
        ]);

        try {
            $visite = new visite();
            $visite->id_visite = $request->id_visite;
            $visite->date_visite = $request->date_visite;
            $visite->id_patient = $request->id_patient; // FK vers patients
            $visite->id_utilisateur = $request->id_utilisateur; // FK vers utilisateurs
            $visite->num_rdv = $request->num_rdv; // FK vers rendezvous
            $visite->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'La visite a été ajoutée',
                'data' => $visite
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Mettre à jour une visite
    public function update(Request $request, visite $visite)
    {
        $request->validate([
            'date_visite' => 'required|date',
            'id_patient' => 'required|exists:patients,id',
            'id_utilisateur' => 'required|exists:utilisateurs,id',
            'num_rdv' => 'required|exists:rendezvous,num_rdv',
        ]);

        try {
            $visite->date_visite = $request->date_visite;
            $visite->id_patient = $request->id_patient;
            $visite->id_utilisateur = $request->id_utilisateur;
            $visite->num_rdv = $request->num_rdv;
            $visite->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La visite a été modifiée',
                'data' => $visite
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    
    public function destroy(visite $visite)
    {
        try {
            $visite->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La visite a été supprimée',
                'data' => $visite
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
