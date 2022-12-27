<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type_logement extends Model
{
    use HasFactory;
    protected $fillable=[
        'libelle',
        'quantité',
        'disponible',
        'bareme',
    ];

public function contrat(){
    return $this->hasMany(contrats::class);
}
}
