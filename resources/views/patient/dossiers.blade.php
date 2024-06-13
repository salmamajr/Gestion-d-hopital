@extends('layouts.patientdashboard')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

<div class="container mt-5 p-10 m-2">
    <h1 class="mb-4 text-center text-success">Mes Dossiers Médicaux</h1>
    <table id="dossier" class="display">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Genre</th>
                <th>Date de création</th>
                <th>Allergies</th>
                <th>Traitement</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dossiers as $dossier)
            <tr>
                <td><strong>{{ $dossier->patient->name }}</strong></td>
                <td><strong>{{ $dossier->patient->genre }}</strong></td>
                <td><strong>{{ $dossier->date_creation }}</strong></td>
                <td><strong>{{ $dossier->allergies }}</strong></td>
                <td><strong>{{ $dossier->traitement }}</strong></td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Aucun dossier médical trouvé</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dossier').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
                },
                dom: 'Bfrtip',
                buttons: ['print'
                ]
            });
        });
    </script>
@endsection

@endsection
