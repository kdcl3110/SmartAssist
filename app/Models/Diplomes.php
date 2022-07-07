<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diplomes extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'typedip',
        'serie',
        'anneedop',
        'moyenne',
       'mention',
       'delivrepar',
       'datedeli',
    ];

    public function dataStudents()
    {
        return $this->hasOne(DataStudents::class);
    }
}
