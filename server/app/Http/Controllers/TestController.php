<?php

namespace App\Http\Controllers;

use App\Imports\TestImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TestController extends Controller
{
    public function index(){
        return response()->json([
            'status' => 'success',
            'data' => 'some data'
        ]);
    }

    public function generate_report(Request $request){

        return response()->json([
            'status' => 'success',
            'fileName' => $request->file('excel')->getClientOriginalName()
        ]);

        // Excel::import(new TestImport, 'icbs_primax_test.xlsx');

        // $data = [
        //     'some_data' => 'Henlo',
        //     'some_data_2' => 'I SAID HENLO'
        // ];

        // $pdf = Pdf::loadView('dom_pdf.testpdf', $data);
        // return $pdf->download('invoice.pdf');
    }
}
