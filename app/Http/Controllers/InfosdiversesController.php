<?php

namespace App\Http\Controllers;

use App\Models\Infosdiverses;
use Illuminate\Http\Request;

class InfosdiversesController extends Controller
{
    function addData(Request $req)
    {
        return Infosdiverses::create($req->all());
    }
}
