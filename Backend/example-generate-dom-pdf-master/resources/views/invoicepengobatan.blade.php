<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .section-title {
            font-weight: bold;
            color: #007bff;
            margin-bottom: 10px;
            margin-top: 30px;
        }
        .table-items th, .table-items td {
            border-bottom: 1px solid #ddd;
        }
        .table-items th {
            text-align: center;
        }
        .table-items td {
            text-align: right;
        }
        .table-items td:first-child {
            text-align: left;
        }
        .total-row th, .total-row td {
            font-weight: bold;
            border-top: 2px solid #000;
        }
        .summary-table th, .summary-table td {
            padding: 5px 10px;
            border: none;
            text-align: right;
        }
        .summary-table th {
            text-align: left;
        }
        .bordered {
            border: 1px solid #ddd;
            padding: 10px;
        }
        hr {
            border: none;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
        .payment-method {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>

    <div class="section-title">DAFTAR BARANG/OBAT</div>

    <table class="table-items">
        <thead>
            <tr>
                <th>NAMA</th>
                <th>HARGA</th>
                <th>JUMLAH</th>
                <th>DISKON</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ALCLAIR GEL</td>
                <td>110,000</td>
                <td>1</td>
                <td>0</td>
                <td>110,000</td>
            </tr>
            <tr class="total-row">
                <th colspan="4">SUB TOTAL BARANG/OBAT</th>
                <td>110,000</td>
            </tr>
        </tbody>
    </table>

    <div class="section-title">PEMBAYARAN</div>

    <table class="summary-table">
        <tr>
            <th>SUB TOTAL</th>
            <td>2,670,000</td>
        </tr>
        <tr>
            <th>TOTAL DISKON PROMO/VOUCHER/REFERAL</th>
            <td>0</td>
        </tr>
        <tr>
            <th>TOTAL</th>
            <td>2,670,000</td>
        </tr>
        <tr>
            <th>PROMO/VOUCHER</th>
            <td></td>
        </tr>
        <tr>
            <th>KODE REFERAL</th>
            <td></td>
        </tr>
    </table>

    <hr>

    <table class="summary-table">
        <tr>
            <th>TOTAL</th>
            <td>2,670,000</td>
        </tr>
        <tr>
            <th>DIBAYARKAN</th>
            <td>2,670,000</td>
        </tr>
        <tr>
            <th>UTANG</th>
            <td>0</td>
        </tr>
        <tr>
            <th>KEMBALIAN</th>
            <td>0</td>
        </tr>
    </table>

    <p class="payment-method">METODE PEMBAYARAN: CASH</p>

</body>
</html>
