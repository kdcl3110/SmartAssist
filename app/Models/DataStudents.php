<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStudents extends Model
{
    use HasFactory;
    protected $table ='datastudents';
    protected $fillable = [
        'user_id',
        'filiation_id',
        'etatcivil_id',
        'filiere_id',
        'diplome_id',
        'infospaiement_id',
        'infosdiverse_id',
    ];
     public function etatcivils()
    {
        return $this->belongsTo(etatcivils::class,'etatcivil_id');
    } 
    public function filiations()
    {
        return $this->belongsTo(Filiation::class,'filiation_id');
    }
    public function filieres()
    {
        return $this->belongsTo(filieres::class,'filiere_id');
    }
    public function diplomes()
    {
        return $this->belongsTo(Diplomes::class,'diplome_id');
    }
    public function infospaiements()
    {
        return $this->belongsTo(Infospaiements::class,'infospaiement_id');
    }
    public function infosdiverses()
    {
        return $this->belongsTo(Infosdiverses::class,'infosdiverse_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
