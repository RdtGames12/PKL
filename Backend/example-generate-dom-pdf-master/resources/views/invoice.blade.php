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
            width: 100%;
            padding: 20px;
            background-color: #fff;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }

        .header .left {
            font-size: 24px;
            font-weight: bold;
            color: #005eb8;
        }

        .header .right {
            text-align: right;
            font-size: 12px;
            color: #333;
        }

        .invoice-title {
            color: #005eb8;
            font-size: 28px;
            font-weight: bold;
        }

        .invoice-info {
            margin-top: 10px;
        }

        .invoice-info .info-item {
            margin-bottom: 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .table th {
            background-color: #f9f9f9;
            text-align: left;
        }

        .total {
            text-align: right;
        }

        .footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="left">
                <img src="logo.png" alt="logo">
            </div>
            <div class="right">
                <p>Villa Istana Bunga</p>
                <p>Jl. Kolonel Masturi, Komplek Villa Istana Bunga, Blok N-85</p>
                <p>Parongpong, Telepon: 0896-6447-2860</p>
            </div>
        </div>

        <!-- Invoice Title -->
        <div class="invoice-title">
            Invoice: INV-VIB-240912-001
        </div>

        <!-- Customer and Invoice Info -->
        <div class="invoice-info">
            <p class="info-item"><strong>Nama:</strong> Beni Maradona</p>
            <p class="info-item"><strong>Tanggal Transaksi:</strong> 28 September 2024</p>
            <p class="info-item"><strong>Cabang:</strong> Villa Istana Bunga</p>
        </div>

        <!-- Table Section -->
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Diskon</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Pendaftaran Khusus Pasien Baru</td>
                    <td>Rp 30.000</td>
                    <td>1</td>
                    <td>Rp 0</td>
                    <td>Rp 30.000</td>
                </tr>
                <tr>
                    <td>Bahan Valplast Gigi Pertama</td>
                    <td>Rp 2.500.000</td>
                    <td>1</td>
                    <td>Rp 0</td>
                    <td>Rp 2.500.000</td>
                </tr>
                <tr>
                    <td>Pendaftaran Khusus Pasien Baru</td>
                    <td>Rp 30.000</td>
                    <td>1</td>
                    <td>Rp 0</td>
                    <td>Rp 30.000</td>
                </tr>
                <tr>
                    <td>Aloclair Gel</td>
                    <td>Rp 110.000</td>
                    <td>1</td>
                    <td>Rp 0</td>
                    <td>Rp 110.000</td>
                </tr>
            </tbody>
        </table>

        <!-- Total Section -->
        <div class="total">
            <p><strong>Subtotal:</strong> Rp 2.670.000</p>
            <p><strong>Total Diskon Promo/Voucher:</strong> Rp 0</p>
            <p><strong>Total Bayar:</strong> Rp 2.670.000</p>
            <p><strong>Dibayarkan:</strong> Rp 2.670.000</p>
            <p><strong>Utang Kembali:</strong> Rp 0</p>
        </div>

        <!-- Footer Section -->
        <div class="footer">
            <p>Metode Pembayaran: CASH</p>
            <p>Tanggal Pembayaran: 23 November 2023 - 12:30 WIB</p>
            <p style="background-color: #005eb8; text-color: white; margin-bottom: 15%;">Passion Dental Care www.passiondentalcare.com/</p>
        </div>
    </div>
</body>

</html>
