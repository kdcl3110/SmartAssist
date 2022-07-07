<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infosdiverses extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'sport',
        'art',
        'numcert',
        'lieucert'
    ];

    public function dataStudents()
    {
        return $this->hasOne(DataStudents::class);
    }
}
