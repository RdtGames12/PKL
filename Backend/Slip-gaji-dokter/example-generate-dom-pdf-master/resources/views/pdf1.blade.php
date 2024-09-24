<!DOCTYPE html>
<html>

<head>
    <title>Slip Gaji Dokter</title>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        body {
            display: flex;
            flex-direction: column;
        }

        .container {
            flex: 1;
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        .content {
            width: 80%;
            margin: 0 auto;
            flex: 1;
            min-height: 80vh;
        }


        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-image: url('images/header.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 80px;
            width: 100%;
        }

        .header img {
            z-index: 1;
            width: 78.79px;
            height: 28px;
        }

        .header h1 {
            font-size: 24px;
            margin: 0;
            color: #19366b;
        }

        .header address {
            z-index: 1;
            font-size: 12px;
            color: white;
        }

        .title {
            text-align: center;
            margin-top: 10px;
        }

        .title h1 {

            color: #19366b;
        }

        .subtitle {
            margin-top: -13px;
            text-align: center;
            color: #4079ce;
        }

        .details {
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
        }

        .details p {
            margin: 5px 0;
        }

        .rincian-kerja,
        .rincian-gaji,
        .potongan,
        .tambahan,
        .total {
            margin-top: 10px;
        }

        .rincian-kerja {
            font-size: 15px;
        }

        .rincian-kerja table,
        .rincian-gaji table {
            width: 40%;
            border-collapse: collapse;
        }

        .rincian-kerja table th {
            color: #7a7a7a;
            font-weight: normal;
        }


        .rincian-gaji .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 5px;
        }

        .rincian-gaji {
            display: flex;
            justify-content: space-between;
        }

        .card {
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 295px;
            margin-bottom: 20px;
            margin-right: 20px;
            background-color: #efeaea;
        }

        .card-small {
            display: inline-block;
            width: 115px; /* Atur lebar card */
            max-width: 120px;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #efeaea;
            margin: 20px 5px;
}


        .card h3 {
            color: #19366b;
            font-weight: bold;
            margin: 7px;
        }

        .card table {
            width: 100%;
        }

        .card td {
            padding: 5px;
        }

        .card td span {
            font-weight: bold;
        }

        .card td p {
            text-align: right;
        }

        .card hr {
            margin: 10px 0; 
        }

        .card h6 {

            font-weight: bold;
        }

        .rincian-gaji .card h3 {
            margin-top: 0;
        }

        .rincian-gaji .card p {
            margin: 0;
            font-weight: normal;
        }

        .rincian-gaji .card span {
            color: #7a7a7a;
            font-weight: normal;
        }

        .potongan,
        .tambahan {
            margin-top: 10px;
            padding: 10px;
            border-radius: 8px;
            background-color: #f0f8ff;
            display: flex;
            justify-content: space-between;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #19366b;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: sans-serif;
            padding: 2.5px 5px;
            border-radius: 5px;
            background-color: #19366d;
            color: white;
            border-radius: 10%;

        }

        .total p {
            text-align: right;
        }

        .details table {
            width: 50%;
            font-weight: normal;
            color: #7a7a7a;
            border-collapse: collapse;
            margin: 0 auto;
        }

        .details table th {
            color: #7a7a7a;
            font-weight: normal;
            vertical-align: top;
            text-align: left;
        }

        .details table td {
            color: #000;
            font-weight: normal;
            padding: 4px 10px;
            vertical-align: top;
        }

        .rincian-gaji {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .details table td {
            padding-left: 54px;
        }

        .footer-container {
            background-color: #19366b;
            color: #fff;
            text-align: center;
            width: 100%;
            padding: 10px 0;
            position: relative;
            bottom: 0;
        }

        .footer {
            margin: 0;
            bottom: 0;
        }

        .footer-container p {
            margin: 0;
        }

        .footer-container a {
            color: #fff;
            text-decoration: none;
        }

        .footer-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <img src="images/garis.png" alt=""
        style="margin-top: 160px; position: absolute; width: 250px; height: 75px; margin-left: -175px; opacity: 0.1;">

    <img src="images/bulat.png" alt=""
        style="margin-top: 160px; position: absolute; width: 250px; height: 75px; right:0; margin-right: -150px; opacity: 0.4;">

    <img src="images/garis.png" alt=""
        style="position: absolute; width: 250px; height: 75px; right: 0; top: 100px; margin-top: 900px; margin-right: -175px; opacity: 0.1;">

    <img src="images/bulat.png" alt=""
        style="position: absolute; width: 250px; height: 75px; top: 100px; margin-top: 900px; margin-left: -150px; opacity: 0.4;">

    <div class="container">
        <div class="header">
            <img src="logo.png" alt="logo" style="padding-left:20px; margin-top:15px;">

            <address style="margin-top: -35px; text-align:right; padding-right: 60px;">
                <b>VILLA ISTANA BUNGA</b><br>
                Jl. Kolonel Masturi Komplek Villa Istana Bunga, <br>Blok N6, Parongpong <br>
                Phone 089646472860
            </address>
        </div>
    </div>

    <div class="content">
        <div class="title">
            <h1>Slip Sharing Dokter</h1>
            <p class="subtitle">September 2024</p>
        </div>

        <div class="details">
            <table>
                <tr>
                    <th>Nama</th>
                    <td>drg.BELA</td>
                </tr>
                <tr>
                    <th>Petugas</th>
                    <td>Super Administrator</td>
                </tr>
                <tr>
                    <th>Waktu Cetak</th>
                    <td>28 September 2024</td>
                </tr>
                <tr>
                    <th>Tanggal Bayar</th>
                    <td>27 September 2024</td>
                </tr>
            </table>
        </div>

        <hr style="color: #7a7a7a">

        <div class="rincian-kerja">
            <h2 style="color: #19366b">Rincian Kerja</h2>
            <table>
                <tr>
                    <th style="text-align: left;">Jumlah Shift</th>
                    <td>3 Shift</td>
                </tr>
                <tr>
                    <th style="text-align: left;">Total Uang Duduk</th>
                    <td>Rp 90.000</td>
                </tr>
            </table>
        </div>

        <hr style="color: #7a7a7a">

        <div class="rincian-gaji">
            <h2 style="color: #19366b">Rincian Gaji</h2>
            <table>
                <tr>
                    <td>
                        <div class="card card-small">
                            <table>
                            <tr>
                                <td><span style="font-size: 10px;">Jumlah Pasien</span></td>
                                <td style="text-align: right;">
                                </td>
                            </tr>
                                <h3 style="font-size: 15px;">30 Pasien</h3>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="card card-small">
                            <table>
                            <tr>
                                <td><span style="font-size: 10px;">Total Transaksi</span></td>
                                <td style="text-align: right;">
                                </td>
                            </tr>
                                <h3 style="font-size: 15px;">Rp 22.340.000</h3>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="card card-small">
                            <table>
                            <tr>
                                <td><span style="font-size: 10px; ">Total Discount</span></td>
                                <td style="text-align: right;">
                                </td>
                            </tr>
                                <h3 style="color: red; font-size: 15px;">-Rp 300.000</h3>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="card card-small">
                            <table>
                            <tr>
                                <td><span style="font-size: 10px;">Total Biaya Sarana/Lab</span></td>
                                <td style="text-align: right;">
                                </td>
                            </tr>
                                <h3 style="color: red; font-size: 15px;">-Rp 300.000</h3>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="card card-small" style="background-color: #19366b;">
                            <table>
                            <tr>
                                <td><span style="font-size: 10px; color: white;">Total Nett. Transaksi</span></td>
                                <td style="text-align: right;">
                                </td>
                            </tr>
                                <h3 style="color: white; font-size: 15px;">Rp 16.850.000</h3>
                            </table>
                        </div>
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td>
                        <div class="card">
                            <h3>Sharing</h3>
                            <table>
                                <tr>
                                    <td><span>Total Sharing Gross</span></td>
                                    <td style="text-align: right;">
                                        <p>Rp 5.264.000</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Total Sharing O/S</span></td>
                                    <td style="text-align: right;">
                                        <p style="color: red">-Rp 2.086.000</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td><span>Total Sharing</span></td>
                                    <td style="text-align: right;">
                                        <p>Rp 3.178.000</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <div class="card">
                            <h3>Potongan</h3>
                            <table>
                                <tr>
                                    <td><span>Total Potongan</span></td>
                                    <td style="text-align: right;">
                                        <p style="color: red">-Rp 32.250</p>
                                    </td>
                                </tr>
                            </table>
                            <div style="margin-top: -5px; text-align:center ">
                                - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                            </div>
                            <h6 style="color: #7a7a7a; margin-top: 7px; padding-left:6px">Keterangan</h6>
                            <h6
                                style="margin-bottom: 0px; font-weight:bold; margin-top: -20px; margin-bottom:5px; padding-left:6px">
                                PPH21</h6>
                        </div>
                    </td>
                </tr>
            </table>
            <div class="card">
                <h3>Tambahan</h3>
                <table>
                    <tr>
                        <td><span>Total Tambahan</span></td>
                        <td style="text-align: right;">
                            <p>Rp 100.000</p>
                        </td>
                    </tr>
                </table>
                <div style="margin-top: 10px; text-align:center ">
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
                </div>
                <h6 style="color: #7a7a7a; padding-left:6px">Keterangan</h6>
                <h6
                    style="margin-bottom: 0px; font-weight:bold; margin-top: -20px; margin-bottom:5px; padding-left:6px">
                    Bonus bulanan
                </h6>
            </div>
        </div>
        <div class="total">
            <table width="100%">
                <tr>
                    <td style="text-align: left; padding-right: 20px;">Total Terima</td>
                    <td style="text-align: right">Rp 3.268.000</td>
                </tr>
            </table>
        </div>
        <hr>
    </div>
    <footer class="footer-container" style="position:absolute; margin-bottom:0; ">
        <small>Passion Dental Care · <a href="www.passiondentalcare.com">www.passiondentalcare.com</a></small>
    </footer>
</body>

</html>
