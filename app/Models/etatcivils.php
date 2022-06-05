<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etatcivils extends Model
{
    use HasFactory;
    //public $timestamps = false;
    protected $fillable = [
        'user_id',
        'code',
        'nom',
        'prenom',
        'date_naiss',
        'datePrécise',
        'lieu_naiss',
        'sexe',
        'statut_matrimonial',
        'situation_pro',
        'premiere_langue',
        'email',
        'telephone',
        'num_cni',
        'adresse',
        'date_rdv',
    ];
    public function DataStudents()
    {
        return $this->belongsTo(DataStudents::class);
    }
}
