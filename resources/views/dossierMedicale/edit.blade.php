@extends('layouts.medecindashboard')

@section('title', 'Modifier Dossier Médical')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier Dossier Médical #{{ $dossierMedicale->id }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('dossierMedicales.update', $dossierMedicale->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="patient_id">Patient</label>
                            <select name="patient_id" id="patient_id" class="form-control">
                                @foreach($patients as $patient)
                                    <option value="{{ $patient->id }}" {{ $dossierMedicale->patient_id == $patient->id ? 'selected' : '' }}>
                                        {{ $patient->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="medecin_id">Médecin</label>
                            <select name="medecin_id" id="medecin_id" class="form-control">
                                @foreach($medecins as $medecin)
                                    <option value="{{ $medecin->id }}" {{ $dossierMedicale->medecin_id == $medecin->id ? 'selected' : '' }}>
                                        {{ $medecin->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="allergies">Allergies</label>
                            <textarea name="allergies" id="allergies" class="form-control">{{ $dossierMedicale->allergies }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="traitement">Traitement</label>
                            <textarea name="traitement" id="traitement" class="form-control">{{ $dossierMedicale->traitement }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                        <a href="{{ route('dossierMedicales.index') }}" class="btn btn-secondary">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
