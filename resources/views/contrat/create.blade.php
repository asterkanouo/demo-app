@extends('layouts.app')


@section('content')

    <h1 class=" d-flex justify-content-center">Etablir un contrat</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form class="col-md-6 border bordered-4 p-4" style="margin:auto;" action="{{ url('contrat') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="nom_complet">Nom du locataire:</label>
            <select type="text" class="rounded "  name="locataire_id" id="locataire_id" >
                <option value=""></option>
                @foreach ($locataires as $locataire )
                <option value="{{$locataire->nom_complet}}  ">{{$locataire->nom_complet}} </option>
                @endforeach
            </select>

        <label class="mx-4" for="type_logement">Type de logement:</label>
            <select type="text" class="rounded "  name="type_logement_id" id="type_logement">
                <option value=""></option>
                @foreach ($type_logements as $type_logement )
                <option value="{{$type_logement->libelle}}  ">{{$type_logement->libelle}} </option>
                @endforeach
            </select>
        </div>

       

        <div class="form-group mb-3">
            <label for="date_signature">Date de signature:</label>
            <input type="date" class="form-control" id="date_signature" placeholder="dd-mm-yyyy" name="date_signature">
        </div>

        <div class="form-group mb-3">
            <label for="date_occupation">Date d'occupation:</label>
            <input type="date" class="form-control" id="date_occupation" placeholder="dd-mm-yyyy" name="date_occupation">
        </div>

        <div class="form-group mb-3">
            <label for="date_fin">Date de fin:</label>
            <input type="date" class="form-control" id="date_fin" placeholder="dd-mm-yyyy" name="date_fin">
        </div>

        <div class="form-group mb-3">
            <label for="loyer_mensuel">Loyer mensuel:</label>
            <input type="number" class="form-control" id="loyer_mensuel" placeholder="loyer_mensuel" name="loyer_mensuel">
        </div>


        <div class="form-group mb-3">
            <label for="nbre_mois_verser">nbre_mois_verser:</label>
            <input type="number" class="form-control" id="nbre_mois_verser" placeholder="nbre_mois_verser" name="nbre_mois_verser">
        </div>

        <div class="form-group mb-3">
            <label for="code_logement">Code logement:</label>
            <input type="text" class="form-control" id="code_logement" placeholder="code_logement" name="code_logement">
        </div>

        <div class="form-group mb-3">
            <label for="caution">caution:</label>
            <input type="number" class="form-control" id="caution" placeholder="caution" name="caution">
        </div>

        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mx-2"><span class="fa fa-save"></span>Enregistrer</button>
        <a type="submit" href="{{url('/contrat')}} " class="btn btn-danger"><span class="fa fa-cancel"></span> Annuler</a>
        </div>
    </form>

    
@endsection
