<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDFinvoice()
    {
        $users = User::get();

        $data = [
            'title' => 'Example Generate PDF',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        // lokasi file pdf rosource/views/pdf

        $pdf = Pdf::loadView('invoice', $data);

        return $pdf->download('invoice.pdf');
    }

    public function generatePDFinvoicepasien()
    {
        $users = User::get();

        $data = [
            'title' => 'Example Generate PDF',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        // lokasi file pdf rosource/views/pdf

        $pdf = Pdf::loadView('invoicepasien', $data);

        return $pdf->download('invoicepasien.pdf');
    }

    public function generatePDFinvoicepengobatan()
    {
        $users = User::get();

        $data = [
            'title' => 'Example Generate PDF',
            'date' => date('m/d/Y'),
            'users' => $users
        ];

        // lokasi file pdf rosource/views/pdf

        $pdf = Pdf::loadView('invoicepengobatan', $data);

        return $pdf->download('invoicepengobatan.pdf');
    }
}
