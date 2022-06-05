<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Filiation;

class FiliationController extends Controller
{   
    function addData(Request $req)
    {
        return Filiation::create($req->all());
    }
}
