<?php

namespace App\Http\Controllers;

use App\Models\Visite;
use Illuminate\Http\Request;
use Exception;

class VisiteController extends Controller
{
    public function index()
    {
        try {
            $visites = Visite::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Liste des visites",
                'data' => $visites
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
            $request->validate([
                'date_visite' => 'required|date',
                'num_rdv' => 'required|exists:rdv,num_rdv',
                'id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
                'id_patient' => 'required|exists:patients,id_patient',
            ]);

            $visite = new Visite();
            $visite->date_visite = $request->date_visite;
            $visite->num_rdv = $request->num_rdv;
            $visite->id_utilisateur = $request->id_utilisateur;
            $visite->id_patient = $request->id_patient;

            $visite->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Visite créée avec succès",
                'data' => $visite
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
        $visite = Visite::find($id);

        if (!$visite) {
            return response()->json(['message' => 'Visite non trouvée'], 404);
        }

        return response()->json($visite);
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'date_visite' => 'required|date',
                'num_rdv' => 'required|exists:rdv,num_rdv',
                'id_utilisateur' => 'required|exists:utilisateurs,id_utilisateur',
                'id_patient' => 'required|exists:patients,id_patient',
            ]);

            $visite = Visite::findOrFail($id);
            $visite->date_visite = $request->date_visite;
            $visite->num_rdv = $request->num_rdv;
            $visite->id_utilisateur = $request->id_utilisateur;
            $visite->id_patient = $request->id_patient;

            $visite->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Visite modifiée avec succès",
                'data' => $visite
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function delete(Visite $visite)
    {
        try {
            $visite->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Visite supprimée avec succès",
                'data' => $visite
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }
}
