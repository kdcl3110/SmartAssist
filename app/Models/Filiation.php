<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filiation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nationalite',
        'region',
        'departement',
        'nom_pere',
        'profe_pere',
        'nom_mere',
        'profe_mere',
        'nom_contact',
        'telephone_contact',
        'ville_contact',
    ];
}
