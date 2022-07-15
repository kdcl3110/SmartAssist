<?php

namespace App\Http\Controllers;

use App\Models\Infospaiements;
use Illuminate\Http\Request;

class InfospaiementsController extends Controller
{
    function addData(Request $req)
    {
        return Infospaiements::create($req->all());
    }
}
