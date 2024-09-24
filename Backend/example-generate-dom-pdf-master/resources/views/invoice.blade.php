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
            color: #000000;
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

        .table th,
        .table td {
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
            text-color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header Section -->
        <div class="header">
            <div class="right">
                <p><strong>Villa Istana Bunga</strong></p>
                <p>Jl. Kolonel Masturi, Komplek Villa Istana Bunga</p>
                <p> Blok N-85, Parongpong<br>Phone: 0896-6447-2860</p>
            </div>
            <div class="left">
                @if ($logoBase64)
                    <img src="{{ $logoBase64 }}" alt="logo" width="150" height="auto">
                @else
                    <p>Logo not available</p>
                @endif
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
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction['nama'] }}</td>
                        <td>Rp {{ number_format($transaction['harga'], 0, ',', '.') }}</td>
                        <td>{{ $transaction['jumlah'] }}</td>
                        <td>Rp {{ number_format($transaction['diskon'], 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($transaction['total'], 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Section -->
        <div class="total">
            <p><strong>Subtotal:</strong> Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
            <p><strong>Total Diskon Promo/Voucher/Referral:</strong> <span style="color: green;">Rp
                    {{ number_format($totalDiskon, 0, ',', '.') }}</span></p>
            <p><strong>Total Promo/Voucher Kode/Referral:</strong> <span style="color: green;">Rp
                    {{ number_format($totalPromo, 0, ',', '.') }}</span></p>
            <br>
            <p><strong>Total Bayar:</strong> Rp {{ number_format($totalBayar, 0, ',', '.') }}</p>
            <p><strong>Dibayarkan:</strong> Rp {{ number_format($dibayarkan, 0, ',', '.') }}</p>
            <p><strong>Utang Kembali:</strong> Rp {{ number_format($utangKembali, 0, ',', '.') }}</p>
        </div>

        <hr>
        <table>
            <tr>
                <td style="text-align: left;">
                    <p>Metode Pembayaran: CASH</p>
                </td>
                <td style="text-align: right; padding-left: 50%;">
                    <p>Tanggal Pembayaran: 23 November 2023 - 12:30 WIB</p>
                </td>
            </tr>
        </table>
        <hr>
        <!-- Footer Section -->
        <div class="footer">
            <p style="background-color: #005eb8; margin-top: 5%;"><span style="color: rgb(255, 255, 255);">Passion Dental Care
                www.passiondentalcare.com/</span></p>
        </div>
    </div>
</body>

</html>
