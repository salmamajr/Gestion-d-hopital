@extends('layouts.medecindashboard')

@section('title', 'Dossiers Médicaux')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">Liste des Dossiers Médicaux</h2>
            <a href="{{ route('dossierMedicales.create') }}" class="btn btn-primary mb-3">
                <i class="fas fa-folder-plus"></i> Créer un Dossier Médical
            </a>
            @if($dossiers->isEmpty())
                <p>Aucun dossier médical trouvé.</p>
            @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Médecin</th>
                            <th>Date de Création</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dossiers as $dossier)
                            <tr>
                                <td>{{ $dossier->id }}</td>
                                <td>{{ $dossier->patient->name }}</td>
                                <td>{{ $dossier->medecin->name }}</td>
                                <td>{{ $dossier->date_creation }}</td>
                                <td>
                                    <a href="{{ route('dossierMedicales.show', $dossier->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Voir
                                    </a>
                                    <a href="{{ route('dossierMedicales.edit', $dossier->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Modifier
                                    </a>
                                    <form action="{{ route('dossierMedicales.destroy', $dossier->id) }}" method="POST" style="display:inline;"  onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Supprimer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection

