@extends('layouts.app')


@section('content')

<div style="margin-top:-15px">
    <h3 class=" d-flex justify-content-center mb-4">Modifier les informations du locataire  LOC00{{ $locataires->id }}/{{date('y')}} </h3>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form class="col-md-6 border bordered-1 p-2" style="margin:auto; font-size:18px;margin-top:-18px" method="post" action="{{ url('locataire/'. $locataires->id) }}" >
        @method('PATCH')
        @csrf

        <div class="form-group mb-3">

        <label for="nom_complet">Nom complet:</label>
        <input type="text" class="form-control" id="nom_complet" readonly  name="nom_complet" value="{{ $locataires->nom_complet }}">

        </div>

        <div class="form-group mb-3">

            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" id="adresse" placeholder="Entrer l\'adresse" name="adresse" value="{{ $locataires->adresse }}">

        </div>

        <div class="form-group mb-3">

            <label for="telephone">Téléphone:</label>
            <input type="number" class="form-control" id="telephone" placeholder="Entrer le numéro de téléphone" name="telephone" value="{{ $locataires->telephone }}">

        </div>

        <div class="form-group mb-3">

        <label for="cni">Numéro de la CNI:</label>
        <input type="number" class="form-control" id="cni" placeholder="Entrer le numéro de la cni" name="cni" value="{{ $locataires->cni }}">

        </div>

        
        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mx-2"><span class="fa fa-save"></span>Enregistrer</button>
        <a type="submit" href="{{url('/locataire')}} " class="btn btn-danger"><span class="fa fa-cancel"></span> Annuler</a>
        </div>
    </form>
</div>
@endsection