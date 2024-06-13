<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Notifications\AppointmentReminder;
use Illuminate\Support\Facades\DB;
use App\Models\Medecin;
use App\Models\Rdv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RdvController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rdvs = Rdv::all();
        return view('rdvs.index', compact('rdvs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
 * Show the form for creating a new resource.
 */


 public function create()
 { $user = Auth::user();
    if ($user->role === 'patient') {
        $medecins = Medecin::all();
        $patientId = $user->patient->id;
        return view('rdvs.create', compact('medecins', 'patientId'));
    } elseif ($user->role === 'medecin') {
        $patients =Patient::all();
        $medecin = $user->medecin;
        return view('rdvs.create', compact('patients', 'medecin'));
    }
    abort(403, 'Unauthorized action.');
 }
 
 

 public function store(Request $request)
 {
     $request->validate([
         'patient_id' => 'required|exists:patients,id',
         'medecin_id' => 'required|exists:medecins,id',
         'date' => 'required|date|after:yesterday',
         'heure' => [
             'required',
             function ($attribute, $value, $fail) use ($request) {
                 $existingRdv = DB::table('rdvs')
                     ->where('date', $request->input('date'))
                     ->where('heure', $value)
                     ->where('medecin_id', $request->input('medecin_id'))
                     ->exists();
 
                 if ($existingRdv) {
                     $fail('Cette heure est déjà réservée pour ce jour.');
                 }
             },
         ],
         'motif' => 'required|string|max:255',
     ]);
 
     Rdv::create([
         'patient_id' => $request->input('patient_id'),
         'medecin_id' => $request->input('medecin_id'),
         'date' => $request->input('date'),
         'heure' => $request->input('heure'),
         'motif' => $request->input('motif'),
     ]);
     return redirect()->route('rdvs.index')->with('success', 'Rendezvous créé avec succès.');
 }
 

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rdv = Rdv::findOrFail($id);

        return view('rdvs.show', compact('rdv'));
    }

    public function edit($id)
    {
        $rdv = Rdv::findOrFail($id);
        $medecins = Medecin::all();

        return view('rdvs.edit', compact('rdv', 'medecins'));
    }

    public function update(Request $request, $id)
    {
        $rdv = Rdv::findOrFail($id);

        $request->validate([
            'medecin_id' => 'required|exists:medecins,id',
            'date' => 'required|date',
           'heure' => 'required',
            'motif' => 'required|string|max:255',
        ]);

        $rdv->update([
            'medecin_id' => $request->input('medecin_id'),
            'date' => $request->input('date'),
            'heure' => $request->input('heure'),
            'motif' => $request->input('motif'),
        ]);

        return redirect()->route('rdvs.index')->with('success', 'Rendezvous updated successfully.');
    }

    public function destroy($id)
    {
        $rdv = Rdv::findOrFail($id);
        $rdv->delete();

        return redirect()->route('rdvs.index')->with('success', 'Rendezvous deleted successfully.');
    }










   
    








}
