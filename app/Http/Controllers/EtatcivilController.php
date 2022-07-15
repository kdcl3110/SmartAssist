<?php

namespace App\Http\Controllers;

use App\Models\DataStudents;
use Illuminate\Http\Request;
use App\Models\etatcivils;

class EtatcivilController extends Controller
{
    function addData(Request $req)
    {
        // $etat= new etatcivils;
        // $etat->user_id=$req->user_id;
        // $etat->code=$req->code;
        // $etat->nom=$req->nom;
        // $etat->prenom=$req->prenom;
        // $etat->date_naiss=$req->date_naiss;
        // $etat->datePrécise=$req->datePrécise;
        // $etat->lieu_naiss=$req->lieu_naiss;
        // $etat->sexe=$req->sexe;
        // $etat->statut_matrimonial=$req->statut_matrimonial;
        // $etat->situation_pro=$req->situation_pro;
        // $etat->premiere_langue=$req->premiere_langue;
        // $etat->email=$req->email;
        // $etat->telephone=$req->telephone;
        // $etat->num_cni=$req->num_cni;
        // $etat->adresse=$req->adresse;
        // $etat->date_rdv=$req->date_rdv;
        // $etat->save() ;
        // echo '<pre>';
        // print_r($etat);
        // echo '</pre>';
        return etatcivils::create($req->all());
        // return $etat;
    }
 }
