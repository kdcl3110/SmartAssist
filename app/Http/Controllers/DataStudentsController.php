<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataStudents;

class DataStudentsController extends Controller
{   
    function addData(Request $req)
    {
        return DataStudents::create($req->all());
    }
}
