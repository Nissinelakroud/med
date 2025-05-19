<?php
namespace App\Http\Controllers;

use App\Models\Rendezvous;
use Illuminate\Http\Request;
use Exception;

class RendezvousController extends Controller
{
    public function index()
    {
        $rendezvous = Rendezvous::with('patient')->get();

        return response()->json($rendezvous);
    } 

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([ 
               
                'date_rdv' => 'required|date',
                'motif' => 'required|string|max:255',
                'id_patient' => 'required|exists:patients,id_patient',
            ]);

            $rdv = Rendezvous::create($validatedData);
            $rdv->load('patient');

            return response()->json($rdv, 201);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
        }
    }


    // Détails d’un rendez-vous
    public function show(Rendezvous $rendezvous)
    {
        // Load patient relation before returning
        $rendezvous->load('patient');

        return response()->json($rendezvous);
    }

    // Mettre à jour un rendez-vous
    public function update(Request $request, $id)
    {
        try {
            $rendezvous = Rendezvous::findOrFail($id);

            $validatedData = $request->validate([ 
                
                'date_rdv' => 'required|date',
                'motif' => 'required|string|max:255',
                'id_patient' => 'required|exists:patients,id_patient',
            ]);

            $rendezvous->update($validatedData);
            $rendezvous->load('patient');

            return response()->json($rendezvous);
        } catch (Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 500);
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
