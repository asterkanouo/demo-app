<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="/image/logo.jpg" />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="  card">
  
    <div class="col-md-8  bordered-4 p-4" style="margin:auto; font-size:22px; margin-top:-30px">

   <div class="row mt-4">
    <div class="d-flex justify-content-center">
         <h1>Etablissement la charité</h1>
    </div>
    <div class="row">
    <div class="d-flex justify-content-center">
        <h3>Service Immobilier: Hebergement-boutique-Magasin</h3>
        
    </div>
    <div class="row">
    <div class="d-flex justify-content-center">
         <h2>Siège social: Yaoundé  BP:______   Tél: 6666666</h2>
    </div>
   </div>
   <P><hr color="blue" size="4"></P>
    <div class="row mt-4  ">
<div class="rounded border mb-4 bg-secondary">
    <div class="col-lg-10 d-flex justify-content-center">
    <p> <b><h1>Contrat de M./Mme  {{ $contrats->locataire->nom_complet}} ({{$contrats->locataire->telephone }})</b></h1></p>
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
    </div>
   <footer class="footer-section  ">
                </div>
                <div class="d-flex justify-content-center footer-section ">
                <h6 class="">Copyright © 2023   <a target="_blank" href="https://designreset.com/">DesignReset</a>, All rights reserved. Coded with &hearts;</h6>
                    
                </div>
            </footer>
    </body>
</html>