@extends('layouts.patientdashboard')

@section('content')
    <div class="container mt-5">
        <h1>Edit Rendezvous</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rdvs.update', $rdv->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="medecin_id" class="form-label text-primary">Medecin:</label>
                <select id="medecin_id" name="medecin_id" class="form-select" required>
                    @foreach($medecins as $medecin)
                        <option value="{{ $medecin->id }}" {{ $rdv->medecin_id == $medecin->id ? 'selected' : '' }}>{{ $medecin->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Please select a medecin.
                </div>
            </div>

            <div class="mb-3">
                <label for="date" class="form-label text-primary">Date:</label>
                <input type="date" id="date" name="date" class="form-control" value="{{ $rdv->date }}" required>
                <div class="invalid-feedback">
                    Please provide a valid date.
                </div>
            </div>
            <div class="mb-3">
                <label for="heure" class="form-label text-primary">Heure:</label>
                <input type="time" id="heure" name="heure" class="form-control" value="{{ $rdv->heure }}" required>
                <div class="invalid-feedback">
                    Please provide a valid time.
                </div>
            </div>

            <div class="mb-3">
                <label for="motif" class="form-label text-primary">Motif:</label>
                <input type="text" id="motif" name="motif" class="form-control" value="{{ $rdv->motif }}" required>
                <div class="invalid-feedback">
                    Please provide a motif.
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Modifier le rendez-vous</button>
        </form>
    </div>
@endsection
