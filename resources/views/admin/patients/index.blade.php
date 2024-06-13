@extends('layouts.admindashboard')


@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<style>
     .title {
        color: blue; 
    }
</style>

<div class="container">
    <h1 class="mb-4">Liste des Patients</h1>
    <table id="patients-table" class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Rendez-vous</th>
                <th>Dossiers Médicaux</th>
            </tr>
        </thead>
        <tbody>
            @foreach($patients as $patient)
                <tr>
                    <td>{{ $patient->name }}</td>
                    <td>
                        <ul>
                            @foreach($patient->rendezvous as $rendezvous)
                                <li><span class="title">{{ $rendezvous->date }} - {{ $rendezvous->heure }}</span> - {{ $rendezvous->motif }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>
                            @foreach($patient->dossiers as $dossier)
                                <li><span class="title">Date de création: </span>{{ $dossier->date_creation }}, <span class="title">Allergies: </span>{{ $dossier->allergies }},<span class="title"> Traitement:</span> {{ $dossier->traitement }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

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
            $('#patients-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/French.json"
                },
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
@endsection
