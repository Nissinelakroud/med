<?php

namespace App\Http\Controllers;

use App\Http\Requests\ordonnanceRequest;
use App\Models\Ordonnance;
use Exception;
use Illuminate\Http\Request;

class OrdonnanceController extends Controller
{
    public function index()
    {
        try {
            // Récupérer toutes les ordonnances
            $ordonnances = Ordonnance::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Liste des ordonnances",
                'data' => $ordonnances
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

    public function store(ordonnanceRequest $request)
    {
        try {
            // Créer une nouvelle ordonnance
            $ordonnance = new Ordonnance();
            $ordonnance->num_ord = $request->num_ord;
            $ordonnance->description = $request->description;
            $ordonnance->id_visite = $request->id_visite; // Associer à une visite existante
            $ordonnance->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "L'ordonnance a été créée.",
                'data' => $ordonnance
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Trouver l'ordonnance par ID
            $ordonnance = Ordonnance::findOrFail($id);

            $ordonnance->num_ord = $request->num_ord;
            $ordonnance->description = $request->description;
            $ordonnance->id_visite = $request->id_visite;

            // Sauvegarder les modifications
            $ordonnance->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'ordonnance a été mise à jour.",
                'data' => $ordonnance
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
            // Trouver l'ordonnance à supprimer par ID
            $ordonnance = Ordonnance::find($id);

            if (!$ordonnance) {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => "Ordonnance non trouvée."
                ]);
            }

            // Supprimer l'ordonnance
            $ordonnance->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'ordonnance a été supprimée.",
                'data' => $ordonnance
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
