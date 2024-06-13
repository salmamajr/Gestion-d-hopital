@extends(Auth::user()->role === 'patient' ? 'layouts.patientdashboard' : 'layouts.medecindashboard')

@section('title', 'User Info')

@section('content')

<style>
    .card:hover {
        background-color: #f8f9fa;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-header:hover {
        background-color: #007bff;
        color: #ffffff;
    }
    
    .button-group {
        display: flex;
        gap: 10px;
    }

    .button-group form {
        margin: 0;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 p-4">
            <div class="card">
                <div class="card-header">Mon profil</div>
                <div class="card-body">
                    <p><strong>Nom:</strong> {{ Auth::user()->name }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    @if(Auth::user()->patient)
                        <p><strong>Numéro de sécurité sociale:</strong> {{ Auth::user()->patient->numero_securite_sociale }}</p>
                        <p><strong>Date de naissance:</strong> {{ Auth::user()->patient->dateNaissance }}</p>
                    @elseif(Auth::user()->medecin)
                    <p><strong>Adresse:</strong> {{ Auth::user()->medecin->adresse}}</p>
                    <p><strong>Date d'embauche:</strong> {{ Auth::user()->medecin->date_embauche }}</p>
                        <p><strong>Spécialité:</strong> {{ Auth::user()->medecin->specialite }}</p>
                        <p><strong>Numéro de licence:</strong> {{ Auth::user()->medecin->numero_licence }}</p>
                        
                    @endif
                    <div class="mt-4 button-group">
                        @if(Auth::user()->role === 'patient')
                            <form method="GET" action="{{ route('patient.edit', ['patient' => Auth::user()->patient]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </form>

                            <form method="POST" action="{{ route('patient.destroy', ['patient' => Auth::user()->patient]) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre profil?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @elseif(Auth::user()->role === 'medecin')
                            <form method="GET" action="{{ route('medecin.edit', ['medecin' => Auth::user()->medecin]) }}">
                                @csrf
                                <button type="submit" class="btn btn-primary"><i class="fas fa-edit"></i></button>
                            </form>

                            <form method="POST" action="{{ route('medecin.destroy', ['medecin' => Auth::user()->medecin]) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer votre profil?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
