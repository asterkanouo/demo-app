@extends('layouts.app')


@section('content')

<div class="col-md-8  bordered-4 p-4" style="margin:auto; font-size:22px; margin-top:-30px">

    <div class="row">
    <div class="col-lg-10">
    <h4>Contrat de M./Mme <b> {{ $contrats->locataire->nom_complet }}  </b></h4>
   <p> {{ $contrats->locataire->telephone }}</p>
    </div>
    
        </div>
    <table class="table table-bordered ">
         <tr>
            <th>Contrat numéro:</th>
            <td>{{ $contrats->id }}</td>
        </tr>

        <tr>
            <th>Locataire:</th>
            <td>{{ $contrats->locataire->nom_complet }}</td>
        </tr>

        <tr>

            <th>Date de signature:</th>
            <td>{{ $contrats->date_signature }}</td>

        </tr>

        <tr>

            <th>Date d'occupation:</th>
            <td>{{ $contrats->date_occupation }}</td>

        </tr>

        <tr>

            <th>Fin du contrat:</th>
            <td>{{ $contrats->date_fin}}</td>

        </tr>

        <tr>

        <th>Montant convenu:</th>
        <td>{{ $contrats->loyer_mensuel}}</td>

        </tr>

        <tr>

        <th>Nbre de mois payés:</th>
        <td>{{ $contrats->nbre_mois_verser}}</td>

        </tr>

        <tr>

        <th>Caution versée:</th>
        <td>{{ $contrats->caution}}</td>

        </tr>

        <tr>

        <th>Type de local:</th>
        <td>{{ $contrats->type_logement->libelle}}</td>

        </tr>
    </table>
    </div>
@endsection
