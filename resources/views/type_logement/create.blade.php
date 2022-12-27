@extends('layouts.app')


@section('content')

    <h1 class=" d-flex justify-content-center">Enregistrer un nouveau logement</h1>


    @if ($errors->any())

        <div class="alert alert-danger">

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form class="col-md-6 border bordered-4 p-4" style="margin:auto;" action="{{ url('/type_logement') }}" method="POST">
        @csrf


        <div class="form-group mb-3">
            <label for="libelle">Libellé:</label>
            <input type="text" class="form-control" id="libelle" placeholder="Libellé" name="libelle">
        </div>

        <div class="form-group mb-3">
            <label for="quantité">Quantité:</label>
            <input type="number" class="form-control" id="quantité" placeholder="quantité" name="quantité">
        </div>




       



        <div class="form-group mb-3">
            <label for="disponible">Disponible:</label>
            <input type="number" class="form-control" id="disponible" placeholder="nombre de chambres disponible" name="disponible">
        </div>

        <div class="form-group mb-3">
            <label for="bareme">Barême:</label>
            <input type="number"  class="form-control" id="bareme" placeholder="bareme" name="bareme">
        </div>

        <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary mx-2"><span class="fa fa-save"></span>Enregistrer</button>
        <a type="submit" href="{{url('/type_logement')}} " class="btn btn-danger"><span class="fa fa-cancel"></span> Annuler</a>
        </div>
    </form>

    
@endsection
