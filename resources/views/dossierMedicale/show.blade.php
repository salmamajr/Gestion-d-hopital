@extends('layouts.medecindashboard')

@section('title', 'Dossier Médical')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4">
            <div class="card">
                <div class="card-header">
                    <h4>Dossier Médical #{{ $dossierMedicale->id }}</h4>
                </div>
                <div class="card-body">
                    <p><strong>Patient:</strong> {{ $dossierMedicale->patient->name }}</p>
                    <p><strong>Médecin:</strong> {{ $dossierMedicale->medecin->name }}</p>
                    <p><strong>Date de Création:</strong> {{ $dossierMedicale->date_creation }}</p>
                    <p><strong>Allergies:</strong> {{ $dossierMedicale->allergies }}</p>
                    <p><strong>Traitement:</strong> {{ $dossierMedicale->traitement }}</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('dossierMedicales.index') }}" class="btn btn-secondary">Retour à la liste</a>
                    <a href="{{ route('dossierMedicales.edit', $dossierMedicale->id) }}" class="btn btn-warning">Modifier</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
