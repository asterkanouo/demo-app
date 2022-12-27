@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-lg-6">

        <h2><b> Gestion des contrats de bail</b></h2>
        

        </div>
        <div class="col-lg-5">
            <input type="search" name="term" id="term" placeholder="chercher un contrat" style="height: 40px;width: 300px;font-size:20px;text-align:center;background-color:#dCfee2" class=" border rounded-2 mb-2 form-control" >
        </div>
        <div class="col-lg-1">
            <a class="btn btn-success" href="{{ url('contrat/create') }}"><span class="fa fa-plus"></span> Ajouter</a>
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
            <th>Contrat numéro</th>
            <th>Titulaire</th>
            <th>Date_signature</th>
            <th>Date_occupation</th>
            <th>Date_fin</th>
            <th>Loyer mensuel</th>
            <th>Nbre_mois_versés</th>
            <th>Type_logement</th>
            <th>code_logement</th>
            <th>Caution</th>
            <th>Actions</th>

        </tr>

        @foreach ($contrats as $index => $contrat)

            <tr>
                <td>{{ $index }}</td>
                <td>CON00{{ $contrat->id }}/{{date('y')}}</td>
                <td>{{ $contrat->locataire->nom_complet }}</td>
                <td>{{ $contrat->date_signature }}</td>
                <td>{{ $contrat->date_occupation }}</td>
                <td>{{ $contrat->date_fin }}</td>
                <td>{{ $contrat->loyer_mensuel }}</td>
                <td>{{ $contrat->nbre_mois_verser }}</td>
                <td>{{ $contrat->type_logement->libelle }}</td>
                <td>{{ $contrat->code_logement }}</td>
                <td>{{ $contrat->caution }}</td>
                <td>

                    <form action="{{ url('contrat/'. $contrat->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                            <a class="btn btn-info" title="Afficher les détails" href="{{ url('contrat/'. $contrat->id) }}"><span class="fa fa-th-list"></span></a>
                            <a class="btn btn-primary" title="modifier" href="{{ url('contrat/'. $contrat->id .'/edit') }}"> <span class="fa fa-edit"></span></a>
                            <button type="submit" title="Ssupprimer" onclick="return confirm(' Etes-vous sûr de vouloir annuler ce contrat?');" class="btn btn-danger"><span class="fa fa-trash"></span></button> 
                      

                    </form>
                </td>

            </tr>

        @endforeach
    </table>

   

@endsection