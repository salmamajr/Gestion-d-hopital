@extends('layouts.medecindashboard')

@section('content')
    <div class="container p-4">
        <h1>Créer un Nouveau Dossier Médical</h1>
        <form action="{{ route('dossierMedicales.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="patient_id">Patient</label>
                <select name="patient_id" id="patient_id" class="form-control">
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="medecin_id">Médecin</label>
                <select name="medecin_id" id="medecin_id" class="form-control">
                    @foreach($medecins as $medecin)
                        <option value="{{ $medecin->id }}">{{ $medecin->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="allergies">Allergies</label>
                <textarea name="allergies" id="allergies" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="traitement">Traitement</label>
                <textarea name="traitement" id="traitement" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
@endsection
