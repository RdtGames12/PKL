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
        $transactions = [
            [
                'nama' => 'Pendaftaran Khusus Pasien Baru',
                'harga' => 30000,
                'jumlah' => 1,
                'diskon' => 0,
                'total' => 30000
            ],
            [
                'nama' => 'Bahan Valplast Gigi Pertama',
                'harga' => 2500000,
                'jumlah' => 1,
                'diskon' => 0,
                'total' => 2500000
            ],
            [
                'nama' => 'Aloclair Gel',
                'harga' => 110000,
                'jumlah' => 1,
                'diskon' => 0,
                'total' => 110000
            ]
        ];


        $subtotal = array_sum(array_column($transactions, 'total'));
        $totalDiskon = array_sum(array_column($transactions, 'diskon'));
        $totalPromo = array_sum(array_column($transactions, 'promo'));
        $totalBayar = $subtotal - $totalDiskon;
        $dibayarkan = $totalBayar;
        $utangKembali = 0;


        $logoBase64 = $this->getBase64Logo();

        $backgroundBase64 = $this->getBase64Background();


        $data = [
            'title' => 'Invoice',
            'date' => date('d/m/Y'),
            'transactions' => $transactions,
            'subtotal' => $subtotal,
            'totalDiskon' => $totalDiskon,
            'totalPromo' => $subtotal,
            'totalBayar' => $totalBayar,
            'dibayarkan' => $dibayarkan,
            'utangKembali' => $utangKembali,
            'logoBase64' => $logoBase64,
        ];


        $pdf = Pdf::loadView('invoice', $data);


        return $pdf->download('invoice.pdf');
    }


    private function getBase64Logo()
    {
 
        $path = public_path('logo.png');


        $logo = file_get_contents($path);
        $base64 = 'data:image/png;base64,' . base64_encode($logo);

        return $base64;
    }

    private function getBase64Background()
    {
 
        $path = public_path('background.png');


        $background = file_get_contents($path);
        $base64 = 'data:image/png;base64,' . base64_encode($background);

        return $base64;
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
