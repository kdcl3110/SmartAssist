<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataStudents;
use App\Models\etatcivils;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DataStudentsController extends Controller
{   
    function addData(Request $req)
    {
        return DataStudents::create($req->all());
    }
    function store($id)
    {
        
        return $datastudent = DataStudents::with('etatcivils','filiations','filieres','diplomes','infospaiements','infosdiverses')->get();
       // $users=DB::table('users')->get();
       //$data=DB::table('etatcivils')->find($id);
        // $etat = json_decode(json_encode($user), true);
        // return $etat;   
    }
}
