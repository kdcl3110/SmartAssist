<?php

namespace App\Http\Controllers;

use App\Models\Filieres;
use Illuminate\Http\Request;

class Fili√®resController extends Controller
{
    function addData(Request $req)
    {
        return Filieres::create($req->all());
    }
}
