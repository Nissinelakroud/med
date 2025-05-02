<?php

namespace App\Http\Controllers;

use App\Models\Medicament;
use Illuminate\Http\Request;
use App\Http\Requests\MedicamentRequest;
use Exception;

class MedicamentController extends Controller
{    public function index()
    {
        $medicaments = Medicament::all();

        return response()->json([
            'status_code' => 200,
            'data' => $medicaments
        ]);
    }

  
    public function store(MedicamentRequest $request)
    {
        try {
            $medicament = new Medicament();
            $medicament->num_med = $request->num_med;
            $medicament->nom_med = $request->nom_med;
            $medicament->therapeutique = $request->therapeutique;
            $medicament->unite = $request->unite;
            $medicament->forme_galenique = $request->forme_galenique;
            $medicament->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "Le médicament a été ajouté",
                'data' => $medicament
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

   
    public function show(Medicament $medicament)
    {
        return response()->json([
            'status_code' => 200,
            'data' => $medicament
        ]);
    }

   
    public function update(MedicamentRequest $request, Medicament $medicament)
    {
        try {
            $medicament->num_med = $request->num_med;
            $medicament->nom_med = $request->nom_med;
            $medicament->therapeutique = $request->therapeutique;
            $medicament->unite = $request->unite;
            $medicament->forme_galenique = $request->forme_galenique;
            $medicament->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'Le médicament a été modifié',
                'data' => $medicament
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

   
    public function destroy(Medicament $medicament)
    {
        try {
            $medicament->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "Le médicament a été supprimé",
                'data' => $medicament
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
