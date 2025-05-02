<?php

namespace App\Http\Controllers;

use App\Models\Rendezvous;
use App\Http\Requests\RendezvousRequest;
use Exception;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    // Liste de tous les rendez-vous
    public function index()
    {
        $rendezvous = Rendezvous::all();

        return response()->json([
            'status_code' => 200,
            'data' => $rendezvous
        ]);
    }

    // Ajouter un rendez-vous
    public function store(RendezvousRequest $request)
    {
        try {
            $rendezvous = new Rendezvous();
            $rendezvous->num_rdv = $request->num_rdv;
            $rendezvous->date_rdv = $request->date_rdv;
            $rendezvous->motif = $request->motif;
            $rendezvous->id = $request->id;
            $rendezvous->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Le rendez-vous a été ajouté",
                'data' => $rendezvous
            ]);
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
    public function update(RendezvousRequest $request, Rendezvous $rendezvous)
    {
        try {
            $rendezvous->date_rdv = $request->date_rdv;
            $rendezvous->motif = $request->motif;
            $rendezvous->id_patient = $request->id_patient;
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
    public function destroy(Rendezvous $rendezvous)
    {
        try {
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
