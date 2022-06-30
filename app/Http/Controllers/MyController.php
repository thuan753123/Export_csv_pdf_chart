<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\ContentTypes;
use Sabberworm\CSS\Property\Charset;

class MyController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function importExportView()
    {
       return view('import');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {   
        $content = new UsersExport();
        
        return Excel::download($content, 'respon.csv');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {   
       
        $input = request()->file('file');
        $this->setInputEncoding($input);
        Excel::import(new UsersImport,$input);
             
        return back();
    }

   public function setInputEncoding($file) {
        $fileContent = file_get_contents($file->path());
        $enc = mb_detect_encoding($fileContent, mb_list_encodings(), true);
    
        config('excel.imports.csv.input_encoding', $enc);
    }

}
