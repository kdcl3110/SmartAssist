<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStudents extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'filiation_id',
        'etatcivil_id'
    ];
    public function etatcivils()
    {
        return $this->hasOne(etatcivils::class);
    }
    public function filiations()
    {
        return $this->hasOne(Filiation::class);
    }
}
