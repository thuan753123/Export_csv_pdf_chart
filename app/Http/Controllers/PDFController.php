<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf;


use mikehaertl\wkhtmlto\Pdf;
use App\Charts\LineGraphChart;

class PDFController extends Controller
{
    public function index()
    {  
        $notes = Note::all();

        return view('viewPDF', compact('notes'));
    }

    public function dompdfPDF(){
        // $notes = Note::get();
        // $dompdf = new Dompdf();
        // $dompdf->loadHtml(view('myPDF'));
        // $dompdf->render();

        // return $dompdf->stream('domPdf.pdf');
    }

    public function generatePDF(){
        // $notes = Note::get();
        // $data = [
        //     'title' => 'hello pdf',
        //     'date' => date('m/d/Y'),
        //     'notes' => $notes
        // ]; 
        // $pdf = PDF::loadView('myPDF', $data);
        // $pdf->render();
        // return $pdf->stream('demo_final.pdf');
    }

    public function chartPDF(LineGraphChart $chart){
        
        $notes = Note::all();
        $data = [
            'chart' => $chart->build(),
            'title' => 'hello pdf',
            'date' => date('m/d/Y'),
            'notes' => $notes
        ]; 
        $render = view('viewPDF',$data)->render();
        
   
        $pdf = new Pdf;
        
        $pdf->addPage($render);
        $pdf->setOptions(['javascript-delay' => 5000]);
        $pdf->saveAs(public_path('report/report.pdf'));
        
        return response()->download(public_path('report/report.pdf'));
    }
}
