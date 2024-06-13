<?php
namespace App\Http\Controllers;

use App\Models\DossierMedicale;
use App\Models\Patient;
use App\Models\Medecin;
use Illuminate\Http\Request;
class DossierMedicaleController extends Controller
{
   

    public function index()
{
    $dossiers = DossierMedicale::all();
    return view('dossierMedicale.index', compact('dossiers'));
}

public function create()
{  

        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('dossierMedicale.create', compact('patients', 'medecins'));
    }

    public function store(Request $request)
    {
        $dossier = new DossierMedicale();
        $dossier->patient_id = $request->input('patient_id');
        $dossier->medecin_id = $request->input('medecin_id');
        $dossier->date_creation = now();
        $dossier->allergies = $request->input('allergies');
        $dossier->traitement = $request->input('traitement');
        $dossier->save();

        return redirect()->route('dossierMedicales.index');
    }

    public function show($id)
    {
        $dossierMedicale = DossierMedicale::findOrFail($id);
        return view('dossierMedicale.show', compact('dossierMedicale'));
    }

    public function edit($id)
    {
        $dossierMedicale = DossierMedicale::findOrFail($id);
        $patients = Patient::all();
        $medecins = Medecin::all();
        return view('dossierMedicale.edit', compact('dossierMedicale', 'patients', 'medecins'));
    }

    public function update(Request $request, $id)
    {
        $dossier = DossierMedicale::findOrFail($id);
        $dossier->patient_id = $request->input('patient_id');
        $dossier->medecin_id = $request->input('medecin_id');
        $dossier->allergies = $request->input('allergies');
        $dossier->traitement = $request->input('traitement');
        $dossier->save();

        return redirect()->route('dossierMedicales.index');
    }

    public function destroy($id)
    {
        $dossier = DossierMedicale::findOrFail($id);
        $dossier->delete();

        return redirect()->route('dossierMedicales.index');
    }



    public function showPatientDossiers($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        $dossiers = DossierMedicale::where('patient_id', $patientId)->get();
    
        return view('patients.dossiers', compact('dossiers', 'patient'));
    }
    

}
