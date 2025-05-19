<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConsultationRequest;
use App\Models\Consultation;
use Exception;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Log; // Ajouter cette ligne


class ConsultationController extends Controller
{
    public function index()
     { try {
        $consultations = Consultation::all();

        return response()->json([
            'status_code' => 200,
            'status_message' => "Liste des consultations",
            'data' => $consultations
        ]);
    } catch (Exception $e) {
        return response()->json([
            'status_code' => 500,
            'error' => $e->getMessage()
        ]);
    } }

    public function store(ConsultationRequest $request)
    {
        try {
            // Crée une consultation en utilisant les données de la requête
            $consultation = new Consultation(); 
            $consultation->id_consultation = $request->id_consultation;
            $consultation->motif = $request->motif;
            $consultation->temperature = $request->temperature;
            $consultation->symptomes = $request->symptomes;
            $consultation->tension_arterielle_systolique = $request->tension_arterielle_systolique;
            $consultation->tension_arterielle_diastolique = $request->tension_arterielle_diastolique;
            $consultation->saturation_oxygene = $request->saturation_oxygene;
            $consultation->frequence_cardiaque = $request->frequence_cardiaque;
            $consultation->poids = $request->poids;
            $consultation->taille = $request->taille;
            $consultation->diagnostic_principal = $request->diagnostic_principal;
            $consultation->traitement = $request->traitement;
            $consultation->id_patient = $request->id_patient; 
            $consultation->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "La consultation a été créée.",
                'data' => $consultation
            ]);
        } catch (Exception $exception) {
            return response()->json($exception);
        }
    }

    public function update(Request $request, $id)
{
    try {
        // Trouver la consultation par ID
        $consultation = Consultation::findOrFail($id);

        
        $consultation->motif = $request->motif;
        $consultation->temperature = $request->temperature;
        $consultation->symptomes = $request->symptomes;
        $consultation->tension_arterielle_systolique = $request->tension_arterielle_systolique;
        $consultation->tension_arterielle_diastolique = $request->tension_arterielle_diastolique;
        $consultation->saturation_oxygene = $request->saturation_oxygene;
        $consultation->frequence_cardiaque = $request->frequence_cardiaque;
        $consultation->poids = $request->poids;
        $consultation->taille = $request->taille;
        $consultation->diagnostic_principal = $request->diagnostic_principal;
        $consultation->traitement = $request->traitement;
        $consultation->id_visite = $request->id_visite;

        // Sauvegarder les changements
        $consultation->save();

        return response()->json([
            'status_code' => 200,
            'status_message' => "La consultation a été mise à jour.",
            'data' => $consultation
        ]);
    } catch (Exception $exception) {
        return response()->json([
            'status_code' => 500,
            'error' => $exception->getMessage()
        ]);
    }
}



    public function delete($id)
    {
        try {
            // Essaye de trouver la consultation par son id
            $consultation = Consultation::find($id);

            // Vérifie si l'objet existe avant de tenter la suppression
            if (!$consultation) {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => "Consultation non trouvée."
                ]);
            }

            // Supprime la consultation
            $consultation->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "La consultation a été supprimée.",
                'data' => $consultation
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
    }
    

