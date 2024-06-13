<?php

namespace App\Http\Controllers;

use App\Models\DossierMedicale;
use App\Models\Medecin;
use App\Models\Patient;
use App\Models\User;
use App\Models\Rdv;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
{
    $medecins = Medecin::all();
    return view('admin.medecins.index', compact('medecins'));
}


public function totals()
{   
    $totalPatients = Patient::count();
    $totalMedecins = Medecin::count();
    return view('admin.dash', compact('totalPatients', 'totalMedecins'));
}

    public function create()
    {
        return view('admin.medecins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'specialite' => 'required|string|max:255',
            'numero_licence' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_embauche' => 'required|date',
        ]);

        
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'medecin',
        ]);

        
        Medecin::create([
            'user_id' => $user->id,
            'name' => $request->input('name'),
            'specialite' => $request->input('specialite'),
            'numero_licence' => $request->input('numero_licence'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'adresse' => $request->input('adresse'),
            'date_embauche' => $request->input('date_embauche'),
        ]);

        return redirect()->route('admin.medecins.index')->with('success', 'Médecin ajouté avec succès');
    }
    
    public function edit($id)
    {
        $medecin = Medecin::findOrFail($id);
        return view('admin.medecins.edit', compact('medecin'));
    }

    public function update(Request $request, $id)
    {
        $medecin = Medecin::findOrFail($id);
        $user = User::findOrFail($medecin->user_id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'specialite' => 'required|string|max:255',
            'numero_licence' => 'required|string|max:255',
            'telephone' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_embauche' => 'required|date',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        $medecin->update([
            'name' => $request->input('name'),
            'specialite' => $request->input('specialite'),
            'numero_licence' => $request->input('numero_licence'),
            'telephone' => $request->input('telephone'),
            'email' => $request->input('email'),
            'adresse' => $request->input('adresse'),
            'date_embauche' => $request->input('date_embauche'),
        ]);

        return redirect()->route('admin.medecins.index')->with('success', 'Médecin mis à jour avec succès');
    }

    public function destroy($id)
    {
        $medecin = Medecin::findOrFail($id);
        $user = User::findOrFail($medecin->user_id);
        $medecin->delete();
        $user->delete();

        return redirect()->route('admin.medecins.index')->with('success', 'Médecin supprimé avec succès');
    }

    public function viewRdvs($id)
    {
        $rdvs = Rdv::where('medecin_id', $id)->get();
        return view('admin.medecins.rdvs', compact('rdvs'));
    }

    public function viewDossiers($id)
    {
        $dossiers = DossierMedicale::where('medecin_id', $id)->get();
        return view('admin.medecins.dossiers', compact('dossiers'));
    }




    public function patientsIndex()
    {
        $patients = Patient::with(['rendezvous', 'dossiers'])->get();
        return view('admin.patients.index', compact('patients'));
    }












}




