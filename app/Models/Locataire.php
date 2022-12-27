<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locataire extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_complet',
        'adresse',
        'telephone',
        'cni',
        'nbre_contrat',
    ];

    public function contrat(){

        return $this->hasMany(Contrat::class);
    }

}

