@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-flex justify-content-center" >Gestion des Locations à Etoug-Ebe</h3>
                </div>

                <div class="card-body" style="">
                    @if (session('status'))
                        <div class="  alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Vous êtes connectés!') }}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
