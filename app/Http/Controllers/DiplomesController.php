<?php

namespace App\Http\Controllers;

use App\Models\Diplomes;
use Illuminate\Http\Request;

class DiplomesController extends Controller
{
    function addData(Request $req)
    {
        return Diplomes::create($req->all());
    }
}
