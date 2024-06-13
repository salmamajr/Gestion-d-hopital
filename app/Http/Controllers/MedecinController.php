<?php

namespace App\Http\Controllers;

use App\Models\Medecin;
use App\Models\Rdv;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MedecinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medecins = Medecin::all();
        return view('medecins.index', compact('medecins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Medecin $medecin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medecin $medecin)
    {
        return view('medecin.edit', compact('medecin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medecin $medecin)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialite' => 'required|string|max:255',
            'numero_licence' => 'required|string|max:255|unique:medecins,numero_licence,' . $medecin->id,
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255|unique:medecins,email,' . $medecin->id,
            'adresse' => 'required|string|max:255',
            'date_embauche' => 'required|date',
        ]);

        $medecin->update($request->all());

        return redirect()->route('user.info')->with('success', 'Medecin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medecin $medecin)
    {
        $medecin->delete();

        return redirect()->route('user.info')->with('success', 'Medecin deleted successfully');
    }





public function getNombreRdvsPatient()
{
    $patientId = Auth::id();
    $nombreRdvs = Rdv::where('patient_id', $patientId)->count();
    return $nombreRdvs;
}



public function showDossiers($medecinId)
{
    $medecin = Medecin::findOrFail($medecinId);
    $dossiers = $medecin->dossiers()->get();
    return view('medecin.dossiers', compact('medecin', 'dossiers'));
}
}
