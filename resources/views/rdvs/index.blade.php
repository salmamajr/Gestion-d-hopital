@extends(Auth::user()->role === 'patient' ? 'layouts.patientdashboard' : 'layouts.medecindashboard')


@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Liste des rendez-vous</h1>
            @if(Auth::user()->role === 'patient')
                <a href="{{ route('rdvs.create') }}" class="btn btn-primary mb-3">Créer un nouvel rendez-vous</a>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Motif</th>
                        <th>{{ Auth::user()->role === 'patient' ? 'Médecin' : 'Patient' }}</th>
                        @if(Auth::user()->role === 'patient')
                            <th>Action</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rdvs as $rdv)
                        <tr>
                            <td>{{ $rdv->date }}</td>
                            <td>{{ $rdv->heure }}</td>
                            <td>{{ $rdv->motif }}</td>
                            <td>{{ Auth::user()->role === 'patient' ? $rdv->medecin->name?? 'Non attribué' : $rdv->patient->name }}</td>
                            @if(Auth::user()->role === 'patient')
                                <td>
                                    <a href="{{ route('rdvs.edit', $rdv->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                            @endif

                                </td>
                                <td>  
                                    <form action="{{ route('rdvs.destroy', $rdv->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce rendez-vous?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
