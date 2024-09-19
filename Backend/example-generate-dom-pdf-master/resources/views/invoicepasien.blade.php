<!DOCTYPE html>
<html>

<head>
    <title>{{ $title ?? 'Invoice' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        .logo {
            display: flex;
            align-items: center;
            background-image: url(logo.png);
        }

        .logo img {
            height: 40px;
            margin-right: 10px;
            background-image: url(logo.png);
        }

        .header-right {
            text-align: right;
        }

        .header-right p {
            margin: 0;
            font-size: 12px;
        }

        .invoice-title {
            color: #005eb8;
            font-size: 20px;
            font-weight: bold;
            margin: 20px 0;
        }

        .invoice-info {
            margin-bottom: 20px;
        }

        .invoice-info p {
            margin: 5px 0;
            font-size: 14px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f0f0f0;
            text-align: left;
        }

        .table td {
            text-align: right;
        }

        .table .left {
            text-align: left;
        }

        .total-section {
            margin-top: 20px;
        }

        .total-section .right {
            text-align: right;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
        }

        .blue-text {
            color: #005eb8;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="logo">
                <img src="logo.png" alt="logo">
            </div>
            <div class="header-right">
                <h4 class="blue-text">INVOICE<br><span class="blue-text">INV-VIB-240912-001</span></h4>
                <p>NAMA: <span>Beni Maradona</span></p>
                <p>TGL. TRANSAKSI: <span>2024-09-12</span></p>
                <p>CABANG: <span>Villa Istana Bunga</span></p>
            </div>
        </div>

        <!-- Invoice Info -->
        <div class="invoice-info">
            <p class="blue-text">DAFTAR TINDAKAN</p>
        </div>

        <!-- Table Section -->
        <table class="table">
            <thead>
                <tr>
                    <th class="left">NAMA</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>DISKON</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="left">PENDAFTARAN KHUSUS PASIEN BARU</td>
                    <td>30,000</td>
                    <td>1</td>
                    <td>0</td>
                    <td>30,000</td>
                </tr>
                <tr>
                    <td class="left">BAHAN VALPLAST GIGI PERTAMA</td>
                    <td>2,500,000</td>
                    <td>1</td>
                    <td>0</td>
                    <td>2,500,000</td>
                </tr>
                <tr>
                    <td class="left">PENDAFTARAN KHUSUS PASIEN BARU</td>
                    <td>30,000</td>
                    <td>1</td>
                    <td>0</td>
                    <td>30,000</td>
                </tr>
            </tbody>
        </table>

        <!-- Subtotal Section -->
        <div class="total-section">
            <p class="right"><strong>SUB TOTAL TINDAKAN: 2,560,000</strong></p>
        </div>
    </div>
</body>

</html>
