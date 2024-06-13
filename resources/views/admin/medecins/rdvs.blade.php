@extends('layouts.admindashboard')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center text-success">Rendez-vous du médecin</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Heure</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rdvs as $rdv)
                    <tr>
                        <td>{{ $rdv->id }}</td>
                        <td>{{ $rdv->patient->name }}</td>
                        <td>{{ $rdv->date }}</td>
                        <td>{{ $rdv->heure }}</td>
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
        background-color: #28a745;
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
