<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $users = User::get();

        $data = [
            'title' => 'Example Generate PDF',
            'date' => date('m/d/Y'),
            'users' =>  $users
        ];
        $pdf = Pdf::loadView('pdf1', $data);
        return $pdf->stream('default_gaji.pdf');
    }

    public function  generatePDF2()
    {
        $users = User::get();
        $data = [
            'title' => 'Example Generate PDF 2',
            'date' => date('m/d/Y'),
            'users' =>  $users
        ];
        $pdf = Pdf::loadView('pdf2', $data);
        return $pdf->stream('gaji_potongan0.pdf');
    }

    public function  generatePDF3()
    {
        $users = User::get();
        $data = [
            'title' => 'Example Generate PDF 3',
            'date' => date('m/d/Y'),
            'users' =>  $users
        ];
        $pdf = Pdf::loadView('pdf3', $data);
        return $pdf->stream('gaji_potongan0_tambahan0.pdf');
    }
}