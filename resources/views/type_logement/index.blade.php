@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

        <h2><b> Gestion des logements </b></h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('type_logement/create') }}"><span class="fa fa-plus"></span> Ajouter</a>
        </div>

    </div>


    @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>

    @endif

    

    <table class="table table-bordered">

        <tr>

            <th>No</th>
            <th>Logement numéro</th>
            <th>Libellé</th>
            <th>Quantité</th>
            <th>Disponible</th>
            <th> Barême</th>
            <th>Actions</th>

        </tr>
       
        @foreach ($type_logements as $index => $type_logement)
            <tr>
                <td>{{ $index }}</td>
                <td>LOG00{{ $type_logement->id }}/{{date('y')}}</td>
                <td>{{ $type_logement->libelle }}</td>
                <td>{{ $type_logement->quantité }}</td>
                <td>{{ $type_logement->disponible }}</td>
                <td>{{ $type_logement->bareme }}</td>
                <td>

                    <form action="{{ url('type_logement/'. $type_logement->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a class="btn btn-info" title="Afficher les détails" href="{{ url('type_logement/'. $type_logement->id) }}"><span class="fa fa-th-list"></span></a>
                            <a class="btn btn-primary" title="modifier" href="{{ url('type_logement/'. $type_logement->id .'/edit') }}"> <span class="fa fa-edit"></span></a>
                            <button type="submit" title="Supprimer" onclick="return confirm(' Etes-vous sûr de vouloir annuler ce logement?');" class="btn btn-danger"><span class="fa fa-trash"></span></button> 
                      

                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    <script>
    var msg = '{{Session::get('alert') }} ';
    var exist='{{Session::has('alert')}}';
    if (exist)
    alert(msg);
    </script>

    
@endsection
