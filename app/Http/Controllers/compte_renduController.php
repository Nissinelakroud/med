<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Compte_RenduRequest;
use App\Models\Compte_Rendu;
use Exception;

class Compte_RenduController extends Controller
{
    public function index()
    {
        try {
            $compteRendus = Compte_Rendu::all();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Liste des comptes rendus",
                'data' => $compteRendus
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function store(Compte_RenduRequest $request)
    {
        try {
            $compteRendu = new Compte_Rendu();
            $compteRendu->text = $request->text;
            $compteRendu->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Le compte rendu a été ajouté",
                'data' => $compteRendu
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function update(Compte_RenduRequest $request, Compte_Rendu $compteRendu)
    {
        try {
            $compteRendu->text = $request->text;
            $compteRendu->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le compte rendu a été modifié',
                'data' => $compteRendu
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function delete(Compte_Rendu $compteRendu)
    {
        try {
            $compteRendu->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le compte rendu a été supprimé",
                'data' => $compteRendu
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}

