<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Slip Sharing Dokter</h1>

        <div class="card">
            <p> <a href="{{ route('download.default.gaji') }}" target="blank">Default</a> </p>
        </div>

        <div class="card">
            <p> <a href="{{ route('download.gaji.potongan0') }}" target="blank">Potongan 0</a> </p>
        </div>

        <div class="card">
            <p> <a href="{{ route('download.gaji.potongan0.tambahan0') }}" target="blank">Potongan 0 Tambahan 0</a> </p>
        </div>
    </div>
</body>
</html>