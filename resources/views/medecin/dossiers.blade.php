@extends('layouts.medecindashboard')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <div class="container">
        <h1 class="mb-4">Dossiers médicaux du {{ $medecin->name }}</h1>
        <table id="dossier" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Date de création</th>
                    <th>Allergies</th>
                    <th>Traitement</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dossiers as $dossier)
                    <tr>
                        <td>{{ $dossier->id }}</td>
                        <td>{{ $dossier->patient->name }}</td>
                        <td>{{ $dossier->date_creation }}</td>
                        <td>{{ $dossier->allergies }}</td>
                        <td>{{ $dossier->traitement }}</td>
                        <td>
                            <a href="{{ route('dossierMedicales.show', $dossier->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> 
                            </a>
                            <a href="{{ route('dossierMedicales.edit', $dossier->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> 
                            </a>
                            <form action="{{ route('dossierMedicales.destroy', $dossier->id) }}" method="POST" style="display:inline;"  onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> 
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
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
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copier',
                        className: 'btn btn-primary btn-sm'
                    },
                    {
                        extend: 'csv',
                        text: 'Exporter en CSV',
                        className: 'btn btn-primary btn-sm'
                    },
                    {
                        extend: 'excel',
                        text: 'Exporter en Excel',
                        className: 'btn btn-primary btn-sm'
                    },
                    {
                        extend: 'pdf',
                        text: 'Exporter en PDF',
                        className: 'btn btn-primary btn-sm'
                    },
                    {
                        extend: 'print',
                        text: 'Imprimer',
                        className: 'btn btn-primary btn-sm'
                    }
                ]
            });
        });
    </script>
@endsection

@endsection