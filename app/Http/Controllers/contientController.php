<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContientRequest;
use App\Models\Contient;
use Exception;

class ContientController extends Controller
{
    public function index()
    {
        return response()->json([
            'status_code' => 200,
            'data' => Contient::all()
        ]);
    }

    public function store(ContientRequest $request)
    {
        try {
            $contient = new Contient();
            $contient->num_ord = $request->num_ord;
            $contient->num_med = $request->num_med;
            $contient->posologie = $request->posologie;
            $contient->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "L'association ordonnance-médicament a été ajoutée",
                'data' => $contient
            ]);

        } catch (Exception $exception) {
            return response()->json($exception);
        }
    }

    public function update(ContientRequest $request, $num_ord, $num_med)
    {
        try {
            $contient = Contient::where('num_ord', $num_ord)
                                ->where('num_med', $num_med)
                                ->firstOrFail();

            $contient->posologie = $request->posologie;
            $contient->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'La posologie a été mise à jour',
                'data' => $contient
            ]);

        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function delete($num_ord, $num_med)
    {
        try {
            $contient = Contient::where('num_ord', $num_ord)
                                ->where('num_med', $num_med)
                                ->firstOrFail();

            $contient->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'association ordonnance-médicament a été supprimée",
                'data' => $contient
            ]);

        } catch (Exception $exception) {
            return response()->json($exception);
        }
    }
}
