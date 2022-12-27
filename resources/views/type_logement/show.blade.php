@extends('layouts.app')


@section('content')

<div class="col-md-8  bordered-4 p-4" style="margin:auto; font-size:22px; margin-top:-30px">

    <div class="row">
    <div class="col-lg-8">
    <h4>Informations sur le locataire N°-<b>LOC00{{ $locataires->id }}/{{date('y')}}  </b></h4>
    </div>
        <div class="col d-flex justify-content-end">
            <a class="btn btnprn btn-success mx-2 mb-2" href="{{url('impLocataire/'.$locataires->id) }}"><span class="fa fa-print"></span> Imprimer</a>
            <a type="submit" href="{{url('/locataire')}} " class=" mb-2 btn btn-danger"><span class="fa fa-arrow-left"></span> Retour</a>
        </div>
        </div>
    <table class="table table-bordered ">
         <tr>
            <th>locataire numéro:</th>
            <td>LOC00{{ $locataires->id }}/{{date('y')}}</td>
        </tr>

        <tr>
            <th>Locataire:</th>
            <td>{{ $locataires->nom_complet }}</td>
        </tr>

        <tr>

            <th>Adresse:</th>
            <td>{{ $locataires->adresse }}</td>

        </tr>

        <tr>

            <th>Téléphone:</th>
            <td>{{ $locataires->telephone }}</td>

        </tr>

        <tr>

            <th>Numéro de CNI:</th>
            <td>{{ $locataires->cni}}</td>

        </tr>

        
    </table>
    </div>
@endsection
