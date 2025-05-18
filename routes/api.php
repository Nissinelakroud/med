<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\CertificatController;
use App\Http\Controllers\Compte_RenduController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\ContientController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;

// ✅ Routes publiques (PAS besoin de token)
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
});

// ✅ Route de test publique
Route::get('/test-api', function () {
    return response()->json(['message' => 'API OK']);
});

// ✅ Routes protégées (NE FONCTIONNENT QUE SI TOKEN EST PRÉSENT)
Route::middleware(['jwt.auth'])->group(function () {
    Route::get('utilisateur', [UtilisateurController::class, 'index']);
    Route::post('utilisateur/create', [UtilisateurController::class, 'store']);
    Route::put('utilisateur/edit/{utilisateur}', [UtilisateurController::class, 'update']);
    Route::delete('utilisateur/{utilisateur}', [UtilisateurController::class, 'delete']);

    Route::get('visite', [VisiteController::class, 'index']);
    Route::post('visite/create', [VisiteController::class, 'store']);
    Route::put('visite/edit/{visite}', [VisiteController::class, 'update']);
    Route::delete('visite/{visite}', [VisiteController::class, 'delete']);

    Route::get('medicament', [MedicamentController::class, 'index']);
    Route::post('medicament/create', [MedicamentController::class, 'store']);
    Route::put('medicament/edit/{medicament}', [MedicamentController::class, 'update']);
    Route::delete('medicament/{medicament}', [MedicamentController::class, 'delete']);

    Route::get('association', [AssociationController::class, 'index']);
    Route::post('association/create', [AssociationController::class, 'store']);
    Route::put('association/edit/{association}', [AssociationController::class, 'update']);
    Route::delete('association/{association}', [AssociationController::class, 'delete']);

    Route::get('rendezvous', [RendezvousController::class, 'index']);
    Route::post('rendezvous/create', [RendezvousController::class, 'store']);
    Route::put('rendezvous/edit/{rendezvous}', [RendezvousController::class, 'update']);
    Route::delete('rendezvous/{rendezvous}', [RendezvousController::class, 'destroy']);

    Route::get('compte_rendu', [Compte_RenduController::class, 'index']);
    Route::post('compte_rendu/create', [Compte_RenduController::class, 'store']);
    Route::put('compte_rendu/edit/{compte_rendu}', [Compte_RenduController::class, 'update']);
    Route::delete('compte_rendu/{compte_rendu}', [Compte_RenduController::class, 'delete']);

    Route::get('consultation', [ConsultationController::class, 'index']);
    Route::post('consultation/create', [ConsultationController::class, 'store']);
    Route::put('consultation/edit/{consultation}', [ConsultationController::class, 'update']);
    Route::delete('consultation/{consultation}', [ConsultationController::class, 'delete']);

    Route::get('ordonnance', [OrdonnanceController::class, 'index']);
    Route::post('ordonnance/create', [OrdonnanceController::class, 'store']);
    Route::put('ordonnance/edit/{ordonnance}', [OrdonnanceController::class, 'update']);
    Route::delete('ordonnance/{ordonnance}', [OrdonnanceController::class, 'delete']);

    Route::get('certificat', [CertificatController::class, 'index']);
    Route::post('certificat/create', [CertificatController::class, 'store']);
    Route::put('certificat/edit/{certificat}', [CertificatController::class, 'update']);
    Route::delete('certificat/{certificat}', [CertificatController::class, 'delete']);

    Route::get('contient', [ContientController::class, 'index']);
    Route::post('contient/create', [ContientController::class, 'store']);
    Route::put('contient/edit/{contient}', [ContientController::class, 'update']);
    Route::delete('contient/{contient}', [ContientController::class, 'delete']);


    Route::get('patient', [PatientController::class, 'index']);
    Route::post('patient/create', [PatientController::class, 'store']);
    Route::put('patient/edit/{patient}', [PatientController::class, 'update']);
    Route::delete('patient/{patient}', [PatientController::class, 'delete']);
});
