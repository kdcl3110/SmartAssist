<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filieres extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'etablissement',
        'choix1',
        'choix2',
        'choix3',
        'niveau',
        'statut',
    ];

    public function dataStudents()
    {
        return $this->hasOne(DataStudents::class);
    }
}
