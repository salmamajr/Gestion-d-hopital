@extends('layouts.admindashboard')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le profil du médecin</h1>
    <form action="{{ route('admin.medecins.update', $medecin->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $medecin->name }}" required>
        </div>
        <div class="form-group">
            <label for="specialite">Spécialité</label>
            <input type="text" class="form-control" id="specialite" name="specialite" value="{{ $medecin->specialite }}" required>
        </div>
        <div class="form-group">
            <label for="numero_licence">Numéro de licence</label>
            <input type="text" class="form-control" id="numero_licence" name="numero_licence" value="{{ $medecin->numero_licence }}" required>
        </div>
        <div class="form-group">
            <label for="telephone">Téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $medecin->telephone }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $medecin->email }}" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $medecin->adresse }}" required>
        </div>
        <div class="form-group">
            <label for="date_embauche">Date d'embauche</label>
            <input type="date" class="form-control" id="date_embauche" name="date_embauche" value="{{ $medecin->date_embauche }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
