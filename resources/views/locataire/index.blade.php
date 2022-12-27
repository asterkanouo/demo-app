@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-11">

        <h2><b> Gestion des locataires </b></h2>

        </div>

        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('locataire/create') }}"><span class="fa fa-plus"></span> Ajouter</a>
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
            <th>locataire numéro</th>
            <th>Nom complet</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th> Numéro CNI</th>
            <th>Nbre de contrats</th>
            <th>Situation actuelle</th>
            <th>Actions</th>

        </tr>
       
        @foreach ($locataires as $index => $locataire)
            <tr>
                <td>{{ $index }}</td>
                <td>LOC00{{ $locataire->id }}/{{date('y')}}</td>
                <td>{{ $locataire->nom_complet }}</td>
                <td>{{ $locataire->adresse }}</td>
                <td>{{ $locataire->telephone }}</td>
                <td>{{ $locataire->cni }}</td>
                <td>{{ $locataire->nbre_contrat}}</td>
                <td>{{ $locataire->situation }}</td>
                <td>

                    <form action="{{ url('locataire/'. $locataire->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a class="btn btn-info" title="Afficher les détails" href="{{ url('locataire/'. $locataire->id) }}"><span class="fa fa-th-list"></span></a>
                            <a class="btn btn-primary" title="modifier" href="{{ url('locataire/'. $locataire->id .'/edit') }}"> <span class="fa fa-edit"></span></a>
                            <button type="submit" title="Ssupprimer" onclick="return confirm(' Etes-vous sûr de vouloir annuler ce locataire?');" class="btn btn-danger"><span class="fa fa-trash"></span></button> 
                      

                    </form>
                </td>

            </tr>
        @endforeach
    </table>

    <div class=" d-flex justify-content-center form-group col-sm-4">
        <label for="total">TOTAL:</label>
        <input type="text" name="total" id="total" value=""  class="form-control mx-2">
   </div>


    <script>
    var msg = '{{Session::get('alert') }} ';
    var exist='{{Session::has('alert')}}';
    if (exist)
    alert(msg);
    </script>
@endsection