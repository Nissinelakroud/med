<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\ordonnanceRequest;
use App\Models\ordonnance;
use Exception;
class ordonnanceController extends Controller
{
   
    public function index(){
        return 'Liste des ordonnances';
    }
    public function store(ordonnanceRequest $request){

        try{
        $ordonnance = new ordonnance();
        $ordonnance->num_ord=$request->num_ord;
        
        $ordonnance->save();


        return response()->json([
            'status_code'=>201,
            'status_message'=>"l'ordonnance a été ajouté",
            'data'=>$ordonnance
        ]);
        
        }catch(Exception $exception){
            return response()->json($exception);
        }
        
    }

    public function update(ordonnanceRequest $request, ordonnance $ordonnance)
    {
        try {
            $ordonnance->num_ord = $request->num_ord;
           
            $ordonnance->save();

            return response()->json([
                'status_code' => 200,
                'status_message' => 'L[ordonnance a été modifié',
                'data' => $ordonnance
            ]);
        } catch (Exception $exception) {
            return response()->json([
                'status_code' => 500,
                'error' => $exception->getMessage()
            ]);
        }
    }
    public function delete(ordonnance $ordonnance) {
         try{
                $ordonnance->delete();

            return response()->json([
                'status_code'=>200,
                'status_message'=>"lordonnance a été supprimer",
                'data'=>$ordonnance
            ]);
            
            
         }catch(Exception $exception){
            return response()->json($exception);
        }
    }
}
