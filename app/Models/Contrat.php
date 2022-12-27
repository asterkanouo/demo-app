<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{
    use HasFactory;

    protected $fillable=[
        'date_signature',
        'date_occupation',
        'date_fin',
        'loyer_mensuel',
        'nbre_mois_verser',
        'caution',
        'code_logement',
        'type_logement_id',
        'locataire_id',
        
        
    ];

    public function locataire(){
        return $this->belongsTo(Locataire::class);
    }
    public function type_logement(){
        return $this->belongsTo(Type_logement::class);
    }
}

