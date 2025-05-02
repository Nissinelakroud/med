<?php

namespace App\Http\Controllers;

use App\Models\Certificat;
use Illuminate\Http\Request;
use App\Http\Requests\CertificatRequest;
use Exception;

class CertificatController extends Controller
{
    // Liste de tous les certificats
    public function index()
    {
        $certificats = Certificat::all();

        return response()->json([
            'status_code' => 200,
            'data' => $certificats
        ]);
    }

    // Ajouter un certificat
    public function store(CertificatRequest $request)
    {
        try {
            $certificat = new Certificat();
            $certificat->num_certif = $request->num_certif;
            $certificat->contenu = $request->contenu;
            $certificat->id_visite = $request->id_visite;
            $certificat->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Le certificat a été ajouté",
                'data' => $certificat
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Détails d’un certificat
    public function show(Certificat $certificat)
    {
        return response()->json([
            'status_code' => 200,
            'data' => $certificat
        ]);
    }

    // Mettre à jour un certificat
    public function update(CertificatRequest $request, Certificat $certificat)
    {
        try {
            $certificat->num_certif = $request->num_certif;
            $certificat->contenu = $request->contenu;
            $certificat->id_visite = $request->id_visite;
            $certificat->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le certificat a été modifié',
                'data' => $certificat
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    // Supprimer un certificat
    public function destroy(Certificat $certificat)
    {
        try {
            $certificat->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le certificat a été supprimé",
                'data' => $certificat
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
