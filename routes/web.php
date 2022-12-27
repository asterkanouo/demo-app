<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\LocataireController;
use App\Http\Controllers\Type_logementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route :: middleware (['mon']) -> group (function () 
    { 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::controller(ContratController::class)->group(function () {
    
    Route::get('/requete ', 'requete');
    Route::get('/rechercher ', 'rechercher');

    Route::get('/contrat', 'index');
    Route::get('/contrat/create', 'create');
    Route::get('/contrat/{id}', 'show');
    Route::get('/impContrat/{id}', 'imprimer');
    Route::get('/contrat/{id}/edit', 'edit');
    Route::post('/contrat', 'store');
    Route::patch('/contrat/{id}', 'update');
    Route::delete('/contrat/{id}', 'destroy');

});

Route::controller(LocataireController::class)->group(function () {
    Route::get('/locataire', 'index');
    Route::get('/locataire/create', 'create');
    Route::get('/locataire/{id}', 'show');
    Route::get('/locataire/{id}/edit', 'edit');
    Route::post('/locataire', 'store');
    Route::patch('/locataire/{id}', 'update');
    Route::delete('/locataire/{id}', 'destroy');

});


Route::controller(Type_logementController::class)->group(function () {
    Route::get('/type_logement', 'index');
    Route::get('/type_logement/create', 'create');
    Route::get('/type_logement/{id}', 'show');
    Route::get('/type_logement/{id}/edit', 'edit');
    Route::post('/type_logement', 'store');
    Route::patch('/type_logement/{id}', 'update');
    Route::delete('/type_logement/{id}', 'destroy');

});
});
