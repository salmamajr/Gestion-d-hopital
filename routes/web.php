<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DossierMedicaleController;
use App\Http\Controllers\MedecinController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RdvController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//tous
Route::get('/', function () {
    
    return view('welcome');
});

Route::post('/contact/send', [MessageController::class, 'send'])->name('contact.send');









// Route::resource('patients', PatientController::class);













Route::middleware('role:admin')->group(function () {
  
Route::get('/admin/medecins', [AdminController::class, 'index'])->name('admin.medecins.index');
Route::get('/admin/medecins/create', [AdminController::class, 'create'])->name('admin.medecins.create');
Route::post('/admin/medecins', [AdminController::class, 'store'])->name('admin.medecins.store');
Route::get('/admin/medecins/{id}/edit', [AdminController::class, 'edit'])->name('admin.medecins.edit');
Route::put('/admin/medecins/{id}', [AdminController::class, 'update'])->name('admin.medecins.update');
Route::delete('/admin/medecins/{id}', [AdminController::class, 'destroy'])->name('admin.medecins.destroy');

 Route::get('/admin/dash', [AdminController::class, 'totals'])->name('admindash');

Route::get('/admin/medecins/{id}/rdvs', [AdminController::class, 'viewRdvs'])->name('admin.medecins.rdvs');

Route::get('/admin/medecins/{id}/dossiers', [AdminController::class, 'viewDossiers'])->name('admin.medecins.dossiers');

Route::get('/admin/patients', [AdminController::class, 'patientsIndex'])->name('admin.patients.index');

Route::get('/admin/dashboard', function () {
    return view('layouts.admindashboard');
});

});






Route::middleware('role:medecin')->group(function () {
    Route::get('/medecins/{medecinId}/dossiers', [MedecinController::class, 'showDossiers'])->name('medecin.dossiers');
    Route::get('/medecins/{medecin}/edit', [MedecinController::class, 'edit'])->name('medecin.edit');
    Route::put('/medecins/{medecin}', [MedecinController::class, 'update'])->name('medecin.update');
    Route::delete('/medecins/{medecin}', [MedecinController::class, 'destroy'])->name('medecin.destroy');
Route::get('/medecin/dashboard', function () {
    return view('layouts.medecindashboard');
});
Route::get('dossierMedicales', [DossierMedicaleController::class, 'index'])->name('dossierMedicales.index');
Route::get('dossierMedicales/create', [DossierMedicaleController::class, 'create'])->name('dossierMedicales.create');
Route::post('dossierMedicales', [DossierMedicaleController::class, 'store'])->name('dossierMedicales.store');
Route::get('dossierMedicales/{dossierMedicale}', [DossierMedicaleController::class, 'show'])->name('dossierMedicales.show');
Route::get('dossierMedicales/{dossierMedicale}/edit', [DossierMedicaleController::class, 'edit'])->name('dossierMedicales.edit');
Route::put('dossierMedicales/{dossierMedicale}', [DossierMedicaleController::class, 'update'])->name('dossierMedicales.update');
Route::delete('dossierMedicales/{dossierMedicale}', [DossierMedicaleController::class, 'destroy'])->name('dossierMedicales.destroy');
 
 });





Route::middleware('role:patient')->group(function () {
Route::get('/patient/dashboard', function () {
    return view('layouts.patientdashboard');
});

Route::get('/patients/{patientId}/dossiers', [PatientController::class, 'showDossiers'])->name('patient.dossiers');
 Route::get('/patients/{patient}/edit', [PatientController::class, 'edit'])->name('patient.edit');
    Route::put('/patients/{patient}', [PatientController::class, 'update'])->name('patient.update');
    Route::delete('/patients/{patient}', [PatientController::class, 'destroy'])->name('patient.destroy');
});

   


//patient | medecin 
Route::middleware(['role:patient,medecin'])->group(function () {


Route::get('/rdvs', [RdvController::class, 'index'])->name('rdvs.index');

Route::get('/rdvs/create', [RdvController::class, 'create'])->name('rdvs.create');

Route::get('/rdvs/{id}', [RdvController::class, 'show'])->name('rdvs.show');
Route::get('/rdvs/{id}/edit', [RdvController::class, 'edit'])->name('rdvs.edit');
Route::put('/rdvs/{id}', [RdvController::class, 'update'])->name('rdvs.update');
Route::delete('/rdvs/{id}', [RdvController::class, 'destroy'])->name('rdvs.destroy');

Route::post('/rdvs', [RdvController::class, 'store'])->name('rdvs.store');
Route::get('/user/info',  [UserController::class, 'showUserInfo'])->name('user.info');
});






require __DIR__.'/auth.php';





