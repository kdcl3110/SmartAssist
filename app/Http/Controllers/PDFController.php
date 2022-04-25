<?php

namespace App\Http\Controllers;

// use Barryvdh\DomPDF\PDF as DomPDFPDF;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use PDF;
use Illuminate\Support\Facades\Storage;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = [
            'nom' => 'Welcome to Tutsmake.com',
            'prenom' => 'denio',
            'date' => '19/O3/22',
        ];
        $pdf = PDF::loadView('PDFTemplate', $data);
        // ->setPaper('a4', 'landscape')
        // ->setWarnings(false)
        // ->save(public_path("file.pdf"))
        // ->stream();
        // $pdf->store();
        // $pdf->move_uploaded_file('toto', public_path('/pdf'));
        // Storage::put('public/pdf/invoice.pdf', $pdf->output());

        
        $path = public_path('pdf/');
        $date = new DateTime();
        $fileName =  $date->getTimestamp() . '.' . 'pdf';
        $pdf->save($path . '/' . $fileName);
        // return $pdf->download($fileName);

        $path_pdf = 'pdf/' . $date->getTimestamp() . '.pdf';
        return asset($path_pdf);
        // return response(['fiche' => storage_path('app/public/pdf/invoice.pdf')], 200);
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
