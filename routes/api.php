<?php

use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\VisiteController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\RendezvousController;
use App\Http\Controllers\Compte_RenduController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\ContientController;  
use App\Http\Controllers\RoleController; 
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\patientController; 

// Utilisateur
Route::get('utilisateur', [UtilisateurController::class, 'index']);
Route::post('utilisateur/create', [UtilisateurController::class, 'store']);
Route::put('utilisateur/edit/{utilisateur}', [UtilisateurController::class, 'update']);
Route::delete('utilisateur/{utilisateur}', [UtilisateurController::class, 'delete']);

// Visite
Route::get('visite', [VisiteController::class, 'index']);
Route::post('visite/create', [VisiteController::class, 'store']);
Route::put('visite/edit/{visite}', [VisiteController::class, 'update']);
Route::delete('visite/{visite}', [VisiteController::class, 'delete']);

// Medicaments
Route::get('medicament', [MedicamentController::class, 'index']);
Route::post('medicament/create', [MedicamentController::class, 'store']);
Route::put('medicament/edit/{medicament}', [MedicamentController::class, 'update']);
Route::delete('medicament/{medicament}', [MedicamentController::class, 'delete']);

// Association (entre ordonnance et médicaments par exemple)
Route::get('association', [AssociationController::class, 'index']);
Route::post('association/create', [AssociationController::class, 'store']);
Route::put('association/edit/{association}', [AssociationController::class, 'update']);
Route::delete('association/{association}', [AssociationController::class, 'delete']);

// Rendez-vous
Route::get('rendezvous', [RendezvousController::class, 'index']);
Route::post('rendezvous/create', [RendezvousController::class, 'store']);
Route::put('rendezvous/edit/{rendezvous}', [RendezvousController::class, 'update']);
Route::delete('rendezvous/{rendezvous}', [RendezvousController::class, 'delete']);

// Compte-rendu
Route::get('compte_rendu', [Compte_RenduController::class, 'index']);
Route::post('compte_rendu/create', [Compte_RenduController::class, 'store']);
Route::put('compte_rendu/edit/{compte_rendu}', [Compte_RenduController::class, 'update']);
Route::delete('compte_rendu/{compte_rendu}', [Compte_RenduController::class, 'delete']);


Route::get('consultation', [ConsultationController::class, 'index']);
Route::post('consultation/create', [ConsultationController::class, 'store']);
Route::put('consultation/edit/{consultation}', [ConsultationController::class, 'update']);
Route::delete('consultation/{consultation}', [ConsultationController::class, 'delete']);






// Contient (ex : ordonnance contient médicament)
Route::get('contient', [ContientController::class, 'index']);
Route::post('contient/create', [ContientController::class, 'store']);
Route::put('contient/edit/{contient}', [ContientController::class, 'update']);
Route::delete('contient/{contient}', [ContientController::class, 'delete']);
 

Route::get('role', [RoleController::class, 'index']);
Route::post('role/create', [RoleController::class, 'store']);
Route::put('role/edit/{role}', [RoleController::class, 'update']);
Route::delete('role/{role}', [RoleController::class, 'delete']);

Route::get('patient', [patientController::class, 'index']);
Route::post('patient/create', [patientController::class, 'store']);
Route::put('patient/edit/{patient}', [patientController::class, 'update']);
Route::delete('patient/{patient}', [patientController::class, 'delete']);
