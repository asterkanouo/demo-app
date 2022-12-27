@extends('layouts.app')


@section('content')

    <h1 class=" d-flex justify-content-center">Enregistrer un nouveau locataire</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form class="col-md-6 border bordered-4 p-4" style="margin:auto;" action="{{ url('/locataire') }}" method="POST">
        @csrf


        <div class="form-group mb-3">
            <label for="nom_complet">Nom complet:</label>
            <input type="text" class="form-control" id="nom_complet" placeholder="Nom complet" name="nom_complet">
        </div>

        <div class="form-group mb-3">
            <label for="adresse">Adresse:</label>
            <input type="text" class="form-control" id="adresse" placeholder="Adresse" name="adresse">
        </div>

        <div class="form-group mb-3">
            <label for="telephone">Téléphone:</label>
            <input type="number" class="form-control" id="telephone" placeholder="numero de telephone" name="telephone">
        </div>

        <div class="form-group mb-3">
            <label for="cni">Numéro CNI:</label>
            <input type="number"  class="form-control" id="cni" placeholder="cni" name="cni">
        </div>

        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mx-2"><span class="fa fa-save"></span>Enregistrer</button>
        <a type="submit" href="{{url('/locataire')}} " class="btn btn-danger"><span class="fa fa-cancel"></span> Annuler</a>
        </div>
    </form>

    
@endsection
