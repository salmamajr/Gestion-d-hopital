@extends('layouts.patientdashboard')

@section('content')
    <h1>Éditer le profil</h1>
    <form action="{{ route('patients.info.update') }}" method="POST">
        @csrf
        <!-- Vos champs de formulaire ici -->
        <div>
            <label for="name">Nom:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
        </div>
        <div>
            <label for="dateNaissance">Date de Naissance:</label>
            <input type="date" name="dateNaissance" id="dateNaissance" value="{{ old('dateNaissance', $user->patient->dateNaissance ?? '') }}">
        </div>
        <div>
            <label for="genre">Genre:</label>
            <select name="genre" id="genre">
                <option value="homme" {{ old('genre', $user->patient->genre ?? '') == 'homme' ? 'selected' : '' }}>Homme</option>
                <option value="femme" {{ old('genre', $user->patient->genre ?? '') == 'femme' ? 'selected' : '' }}>Femme</option>
                <option value="autre" {{ old('genre', $user->patient->genre ?? '') == 'autre' ? 'selected' : '' }}>Autre</option>
            </select>
        </div>
        <div>
            <label for="adresse">Adresse:</label>
            <input type="text" name="adresse" id="adresse" value="{{ old('adresse', $user->patient->adresse ?? '') }}">
        </div>
        <div>
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" id="telephone" value="{{ old('telephone', $user->patient->telephone ?? '') }}">
        </div>
        <div>
            <label for="numero_securite_sociale">Numéro de Sécurité Sociale:</label>
            <input type="text" name="numero_securite_sociale" id="numero_securite_sociale" value="{{ old('numero_securite_sociale', $user->patient->numero_securite_sociale ?? '') }}">
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
@endsection
