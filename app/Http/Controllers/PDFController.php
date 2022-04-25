<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;

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
        
        $data = [
            'nom' => 'Welcome to Tutsmake.com',
            'prenom' => 'denio',
            'date' => '19/O3/22',
        ];
        $pdf = PDF::loadView('PDFTemplate', $data);

        Storage::put('public/pdf/invoice.pdf', $pdf->output());
        return response(['fiche' => storage_path('app/public/pdf/invoice.pdf')], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
