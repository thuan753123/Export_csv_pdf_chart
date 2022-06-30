<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//route im/export csv
Route::get('importExportView', [MyController::class, 'importExportView']);
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');

//route export pdf
Route::get('generate-pdf', [PDFController::class, 'generatePDF'])->name('export-pdf');
Route::get('viewpdf', [PDFController::class, 'index'])->name('export-viewpdf');
Route::get('dompdf', [PDFController::class, 'dompdfPDF'])->name('export-dompdf');
Route::get('chartpdf',  [PDFController::class, 'chartPDF']);

//route 
Route::get('/drawchart', [UserController::class, 'index'])->name('drawchart');
Route::get('/barchart', [UserController::class, 'index1'])->name('barchart');
Route::get('/linechart', [UserController::class, 'index2'])->name('linechart');

