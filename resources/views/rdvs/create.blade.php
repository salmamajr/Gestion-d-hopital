@extends(Auth::user()->role === 'patient' ? 'layouts.patientdashboard' : 'layouts.medecindashboard')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4 text-center">Créer un nouveau rendez-vous</h1>

            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('rdvs.store') }}" method="POST">
                @csrf

                @if(Auth::user()->role === 'patient')
                    <div class="mb-3">
                        <label for="patient_id" class="form-label text-primary">ID du Patient:</label>
                        <input type="text" class="form-control form-control-plaintext" value="{{ $patientId }}" disabled>
                        <input type="hidden" name="patient_id" value="{{ $patientId }}">
                    </div>

                    <div class="mb-3">
                        <label for="medecin_id" class="form-label text-primary">Médecin:</label>
                        <select id="medecin_id" name="medecin_id" required class="form-select">
                            @foreach($medecins as $medecin)
                                <option value="{{ $medecin->id }}">{{ $medecin->name }} - {{ $medecin->specialite }}</option>
                            @endforeach
                        </select>
                    </div>
                @else
                    <div class="mb-3">
                        <label for="medecin_id" class="form-label text-primary">ID du Médecin:</label>
                        <input type="text" class="form-control form-control-plaintext" value="{{ $medecin->id }}" disabled>
                        <input type="hidden" name="medecin_id" value="{{ $medecin->id }}">
                    </div>

                    <div class="mb-3">
                        <label for="patient_id" class="form-label text-primary">Patient:</label>
                        <select id="patient_id" name="patient_id" required class="form-select">
                            @foreach($patients as $patient)
                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="mb-3">
                    <label for="date" class="form-label text-primary">Date:</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="heure" class="form-label text-primary">Heure:</label>
                    <input type="time" id="heure" name="heure" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="motif" class="form-label text-primary">Motif:</label>
                    <input type="text" id="motif" name="motif" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Créer Rendez-vous</button>
            </form>
        </div>
    </div>
</div>
@endsection
