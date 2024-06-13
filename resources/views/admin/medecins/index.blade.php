@extends('layouts.admindashboard')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="container">
    <h1 class="mb-4">Liste des médecins</h1>
  

    <a href="{{ route('admin.medecins.create') }}" class="btn btn-primary mb-3">Ajouter un médecin</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table id="medecins-table" class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Spécialité</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($medecins as $medecin)
                <tr>
                    <td>{{ $medecin->id }}</td>
                    <td>{{ $medecin->name }}</td>
                    <td>{{ $medecin->specialite }}</td>
                    <td>{{ $medecin->email }}</td>
                    <td>
                    <a href="{{ route('admin.medecins.edit', $medecin->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.medecins.destroy', $medecin->id) }}" method="POST" style="display:inline-block;" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
                        <a href="{{ route('admin.medecins.rdvs', $medecin->id) }}" class="btn btn-info">les RDVs</a>
                        <a href="{{ route('admin.medecins.dossiers', $medecin->id) }}" class="btn btn-secondary">les dossiers médicaux</a>
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
            $('#medecins-table').DataTable({
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