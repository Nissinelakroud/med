<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CertificatRequest;
use App\Models\Certificat;
use Exception;
use Illuminate\Http\Request;

class CertificatController extends Controller
{
    public function index()
    {
        try {
            $certificats = Certificat::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Liste des certificats",
                'data' => $certificats
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 500,
                'error' => $e->getMessage()
            ]);
        }
    }

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
                'status_message' => "Le certificat a été créé.",
                'data' => $certificat
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function update(Request $request, $num_certif)
    {
        try {
            $certificat = Certificat::where('num_certif', $num_certif)->firstOrFail();

            $certificat->contenu = $request->contenu;
            $certificat->id_visite = $request->id_visite;
            $certificat->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le certificat a été mis à jour.",
                'data' => $certificat
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function delete($num_certif)
    {
        try {
            $certificat = Certificat::where('num_certif', $num_certif)->first();

            if (!$certificat) {
                return response()->json([
                    'status_code' => 404,
                    'status_message' => "Certificat non trouvé."
                ]);
            }

            $certificat->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le certificat a été supprimé.",
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
