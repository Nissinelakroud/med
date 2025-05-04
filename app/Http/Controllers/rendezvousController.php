<?php
namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Exception;

class RendezvousController extends Controller
{
    public function index()
    {
        $rendezvous = Rendezvous::all();

        return response()->json([
            'status_code' => 200, 
            'data' => $rendezvous
        ]);
    } 

    public function store(Request $request)
    {
        try {
           
            $validatedData = $request->validate([
                'date_rdv' => 'required|date',
                'motif' => 'required|string|max:255',
                'id_patient' => 'required|exists:patients,id_patient',
            ]);

           
            $rdv = new Rendezvous();
            $rdv->date_rdv = $validatedData['date_rdv'];
            $rdv->motif = $validatedData['motif'];
            $rdv->id_patient = $validatedData['id_patient'];

            
            $rdv->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => 'Rendez-vous créé avec succès',
                'data' => $rdv
            ], 201);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Détails d’un rendez-vous
    public function show(Rendezvous $rendezvous)
    {
        return response()->json([
            'status_code' => 200,
            'data' => $rendezvous
        ]);
    }

    // Mettre à jour un rendez-vous
    public function update(Request $request, $id)
    {
        try {
            // Trouver le rendez-vous par son ID
            $rendezvous = Rendezvous::findOrFail($id);

            // Validation des données
            $validatedData = $request->validate([
                'date_rdv' => 'required|date',
                'motif' => 'required|string|max:255',
                'id_patient' => 'required|exists:patients,id_patient',
            ]);

            // Mettre à jour les champs du rendez-vous
            $rendezvous->date_rdv = $validatedData['date_rdv'];
            $rendezvous->motif = $validatedData['motif'];
            $rendezvous->id_patient = $validatedData['id_patient'];

            // Sauvegarder les modifications
            $rendezvous->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le rendez-vous a été modifié',
                'data' => $rendezvous
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Supprimer un rendez-vous
    public function destroy($id)
    {
        try {
            // Trouver le rendez-vous par son ID
            $rendezvous = Rendezvous::findOrFail($id);

            // Supprimer le rendez-vous
            $rendezvous->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le rendez-vous a été supprimé",
                'data' => $rendezvous
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
