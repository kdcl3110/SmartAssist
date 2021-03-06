<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF as DomPDFPDF;

use App\Models\DataStudents;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class PDFController extends Controller
{
    /**
	 * Generation of the pre-registration form
	 *
	 * this function will retrieve the user's data and generate the pre-registration form
     * @urlParam path="app/public/pdf/invoice.pdf",
	 * @bodyParam  user_id int required The id of the user. Example: 9
     * @bodyParam  data array The data of the student. Example $data = ['nom' => 'Welcome to Tutsmake.com','prenom' => 'denio','date' => '19/O3/22',];
     *  
     * @response  {
     *  "id": 4,
     *  "file": "https://safe-dawn-79771.herokuapp.com/app/public/pdf/invoice.pdf",
     * }
     * @response  404 {
     *  "message": "No query results for model [\App\User]"
     * }
	 */

    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
       
        $data = [
            'nom' => 'Welcome to Tutsmake.com',
            'prenom' => 'denio',
            'date' => '19/O3/22',
        ];
        $etats = DB::table('etatcivils')->find($id);
        $datastudent = DataStudents::with('etatcivils','filiations','filieres','diplomes','infospaiements','infosdiverses')->find($id);
        //return compact('datastudent');
        //return json_decode(json_encode($datastudent), true);
       //return  json_encode($etats);
        //echo $etat;
        //echo var_dump($datastudent) ;
        $pdf = PDF::loadView('PDFTemplate', compact('datastudent'));

        
        $path = public_path('pdf/');
        $date = new DateTime();
        $fileName =  $date->getTimestamp() . '.' . 'pdf';
        $pdf->save($path . '/' . $fileName);
        // return $pdf->download($fileName);

        $path_pdf = 'pdf/' . $date->getTimestamp() . '.pdf';
        return response(['fiche' =>asset($path_pdf)]); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
