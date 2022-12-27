@extends('layouts.app')


@section('content')

<div style="margin-top:-15px">
    <h3 class=" d-flex justify-content-center mb-4">Modifier le Contrat de M./Mme <b> {{ $contrats->locataire->nom_complet }} </h3>


    @if ($errors->any())

        <div class="alert alert-danger" >

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif

    <form class="col-md-6 border bordered-1 p-2" style="margin:auto; font-size:18px;margin-top:-18px" method="post" action="{{ url('contrat/'. $contrats->id) }}" >
        @method('PATCH')
        @csrf

        <div class="form-group mb-3">

        <label for="date_signature">Date de signature:</label>
        <input type="date" class="form-control" id="date_signature" readonly placeholder="Entrer la date de signature" name="date_signature" value="{{ $contrats->date_signature }}">

        </div>

        <div class="form-group mb-3">

            <label for="date_occupation">Date d'occupation:</label>
            <input type="date" class="form-control" id="date_occupation" placeholder="Entrer la date d'occupation" name="date_occupation" value="{{ $contrats->date_occupation }}">

        </div>

        <div class="form-group mb-3">

            <label for="date_fin">Fin du contrats:</label>
            <input type="date" class="form-control" id="date_fin" placeholder="Entrer date de fin du contrats" name="date_fin" value="{{ $contrats->date_fin }}">

        </div>

        <div class="form-group mb-3">

        <label for="loyer_mensuel">Loyer mensuel (Fcfa):</label>
        <input type="number" class="form-control" id="loyer_mensuel" placeholder="Entrer le loyer mensuel" name="loyer_mensuel" value="{{ $contrats->loyer_mensuel }}">

        </div>

        <div class="form-group mb-3">

            <label for="nbre_mois_verser">Nbre_mois_verser:</label>
            <input type="number" class="form-control" id="nbre_mois_verser" placeholder="Entrer le nbre_mois_verser" name="nbre_mois_verser" value="{{ $contrats->nbre_mois_verser }}">

        </div>

        <div class="form-group mb-3">

            <label for="caution">Caution (Fcfa):</label>
            <input type="number" class="form-control" id="caution" placeholder="Entrer caution" name="caution" value="{{ $contrats->caution }}">

        </div>

        <div class="form-group mb-3">
        <label class="" for="type_logement">Type de logement:</label>
            <select type="text"  name="type_logement_id" id="type_logement">
                <option value=""></option>
                @foreach ($type_logements as $type_logement )
                <option value="{{$type_logement->libelle}}  ">{{$type_logement->libelle}} </option>
                @endforeach
            </select>
        </div>

        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mx-2"><span class="fa fa-save"></span>Enregistrer</button>
        <a type="submit" href="{{url('/contrat')}} " class="btn btn-danger"><span class="fa fa-cancel"></span> Annuler</a>
        </div>
    </form>
</div>
@endsection