<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infospaiements extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'numtrans',
        'agence',
    ];


    public function dataStudents()
    {
        return $this->hasOne(DataStudents::class);
    }
}
