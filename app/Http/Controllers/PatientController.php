<?php

namespace App\Http\Controllers;

use App\Models\DossierMedicale;
use App\Models\Patient;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients=Patient::all();
        return view("patients.index",compact("patients"));
    }

   
   
    public function show(Patient $patient)
    {
        return view('patients.dashboard', compact('patient'));
    }
    
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        return view('patient.edit', compact('patient'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {$request->validate([
        'name' => 'required|string|max:255',
        'dateNaissance' => 'required|date',
        'genre' => 'required|string|max:10',
        'adresse' => 'required|string|max:255',
        'telephone' => 'required|string|max:20',
        'email' => 'required|email|max:255|unique:patients,email,' . $patient->id,
        'numero_securite_sociale' => 'required|string|max:50|unique:patients,numero_securite_sociale,' . $patient->id,
    ]);

    $patient->update([
        'name' => $request->input('name'),
        'dateNaissance' => $request->input('dateNaissance'),
        'genre' => $request->input('genre'),
        'adresse' => $request->input('adresse'),
        'telephone' => $request->input('telephone'),
        'email' => $request->input('email'),
        'numero_securite_sociale' => $request->input('numero_securite_sociale'),
    ]);

        return redirect()->route('user.info', $patient)->with('success', 'Patient updated successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('user.info')->with('success', 'Patient deleted successfully');
  
    }



    public function showDossiers($patientId)
{
    $patient = Patient::findOrFail($patientId);
    $dossiers = $patient->dossiers()->get();
    return view('patient.dossiers', compact('patient', 'dossiers'));
}

}
