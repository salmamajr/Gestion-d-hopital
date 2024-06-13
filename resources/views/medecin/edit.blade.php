@extends('layouts.medecindashboard')

@section('title', 'Edit Profile')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Edit Profile</h1>
            <form action="{{ route('medecin.update', ['medecin' => $medecin->id]) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $medecin->name) }}">
                </div>
                
                <div class="form-group">
                    <label for="specialite">Specialité:</label>
                    <input type="text" name="specialite" id="specialite" class="form-control" value="{{ old('specialite', $medecin->specialite) }}">
                </div>
                
                <div class="form-group">
                    <label for="numero_licence">Numéro de licence:</label>
                    <input type="text" name="numero_licence" id="numero_licence" class="form-control" value="{{ old('numero_licence', $medecin->numero_licence) }}">
                </div>
                
                <div class="form-group">
                    <label for="telephone">Téléphone:</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $medecin->telephone) }}">
                </div>
                
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $medecin->email) }}">
                </div>
                
                <div class="form-group">
                    <label for="adresse">Adresse:</label>
                    <input type="text" name="adresse" id="adresse" class="form-control" value="{{ old('adresse', $medecin->adresse) }}">
                </div>
                
                <div class="form-group">
                    <label for="date_embauche">Date d'embauche:</label>
                    <input type="date" name="date_embauche" id="date_embauche" class="form-control" value="{{ old('date_embauche', $medecin->date_embauche) }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </form>
        </div>
    </div>
</div>
@endsection
