@extends('layouts.admindashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-success">Dossiers médicaux du médecin</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Date de création</th>
                    <th>Allergies</th>
                    <th>Traitement</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .container {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .table {
        background-color: white;
    }
    .table thead th {
        background-color: #3FDD67; 
        color: white;
    }
    .table tbody tr:hover {
        background-color: #e2f7e2; 
    }
    h1 {
        color: #28a745; 
    }
    .table tbody tr:nth-child(even) {
        background-color: #f8f9fa;
    }
    .table tbody tr:nth-child(odd) {
        background-color: #ffffff; 
    }
</style>
@endsection
