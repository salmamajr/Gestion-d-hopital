@extends('layouts.patientdashboard')

@section('content')
<style>
    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        font-weight: bold;
    }

    .form-control {
        padding: 0.5rem;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        border-radius: 0.25rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Éditer le profil</h1>
            <form action="{{ route('patient.update', ['patient' => Auth::user()->patient]) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name" class="form-label">Nom:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $patient->name) }}">
                </div>
                
                <div class="form-group">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $patient->email) }}">
                </div>
                
                <div class="form-group">
                    <label for="dateNaissance" class="form-label">Date de Naissance:</label>
                    <input type="date" name="dateNaissance" id="dateNaissance" class="form-control" value="{{ old('dateNaissance', $patient->dateNaissance) }}">
                </div>
                
                <div class="form-group">
                    <label for="genre" class="form-label">Genre:</label>
                    <select name="genre" id="genre" class="form-control">
                        <option value="homme" {{ old('genre', $patient->genre) == 'homme' ? 'selected' : '' }}>Homme</option>
                        <option value="femme" {{ old('genre', $patient->genre) == 'femme' ? 'selected' : '' }}>Femme</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="adresse" class="form-label">Adresse:</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $patient->adresse) }}">
                </div>
                
                <div class="form-group">
                    <label for="telephone" class="form-label">Téléphone:</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $patient->telephone) }}">
                </div>
                
                <div class="form-group">
                    <label for="numero_securite_sociale" class="form-label">Numéro de Sécurité Sociale:</label>
                    <input type="text" name="numero_securite_sociale" id="numero_securite_sociale" class="form-control" value="{{ old('numero_securite_sociale', $patient->numero_securite_sociale) }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
