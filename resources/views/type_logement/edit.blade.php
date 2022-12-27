@extends('layouts.app')


@section('content')

<div style="margin-top:-15px">
    <h3 class=" d-flex justify-content-center mb-4">Modifier le logement  LOG00{{ $type_logements->id }}/{{date('y')}} </h3>

    @if ($errors->any())

<div class=" col-md-6 alert alert-danger mb-3" style="margin:auto;">

    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach

    </ul>

</div>

@endif

    <form class="col-md-6 border bordered-1 p-2" style="margin:auto; font-size:18px;margin-top:-18px" method="post" action="{{ url('type_logement/'. $type_logements->id) }}" >
        @method('PATCH')
        @csrf

        <div class="form-group mb-3">

        <label for="libelle">Libelle:</label>
        <input type="text" class="form-control" id="libelle" placeholder="type de logements" name="libelle" value="{{ $type_logements->libelle }}">

        </div>

        <div class="form-group mb-3">

            <label for="quantité">Quantité:</label>
            <input type="number" class="form-control" id="quantité" placeholder="Entrer la quantité" name="quantité" value="{{ $type_logements->quantité }}">

        </div>




        <div class="form-group mb-3">

            <label for="disponible">Disponible:</label>
            <input type="number" class="form-control" id="disponible" placeholder="Entrer le numéro de téléphone" name="disponible" value="{{ $type_logements->disponible }}">

        </div>




        <div class="form-group mb-3">

        <label for="bareme"> Bareme:</label>
        <input type="number" class="form-control" id="bareme" placeholder="Entrer le numéro de la bareme" name="bareme" value="{{ $type_logements->bareme }}">

        </div>

        
<div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mx-2"><span class="fa fa-save"></span>Enregistrer</button>
        <a type="submit" href="{{url('/type_logement')}} " class="btn btn-danger"><span class="fa fa-cancel"></span> Annuler</a>
        </div>
    </form>
</div>




@endsection