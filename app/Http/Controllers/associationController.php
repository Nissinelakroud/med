<?php

namespace App\Http\Controllers;

use App\Models\Association;
use App\Http\Requests\AssociationRequest;
use Exception;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    public function index()
    {
        $associations = Association::all();

        return response()->json([
            'status_code' => 200,
            'data' => $associations
        ]);
    }

    public function store(AssociationRequest $request)
    {
        try {
            $association = new Association();
            $association->id_visite = $request->id_visite;
            $association->id_cmpt = $request->id_cmpt;
            $association->save();

            return response()->json([
                'status_code' => 201,
                'status_message' => "L'association a été ajoutée",
                'data' => $association
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function update(AssociationRequest $request, Association $association)
    {
        try {
            $association->id_visite = $request->id_visite;
            $association->id_cmpt = $request->id_cmpt;
            $association->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'L\'association a été modifiée',
                'data' => $association
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }

    public function delete(Association $association)
    {
        try {
            $association->delete();

            return response()->json([
                'status_code' => 200,
                'status_message' => "L'association a été supprimée",
                'data' => $association
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
}
