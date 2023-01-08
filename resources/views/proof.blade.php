<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/sub.css">
    <title>Bukti Pembayaran</title>
</head>
<body>
    <style>
        .image img{
            width: 400px;
            margin: 5% 2%;
        }
        .bukti {
            width: 800px;
            background-color: #444;
            border-radius: 20px;
            margin-top: 5%;
            padding-bottom: 20px;
        }
    </style>
    <center>
    <div class="bukti">
        <div class = "image">
            {{-- @if ($showbukti->bukti) --}}
            <img src="{{ asset('images/'.$showbukti->bukti )}}">
            {{-- @endif --}}
        </div>
        @foreach($databukti as $data)
        <div class="text-bukti">
            <h3>Nama Rekening: {{ $data->rekening}}</h3>
            <h3>Pemilik Rekening: {{ $data->pemilik}}</h3>
            <h3>Nominal: {{ $data->nominal}}</h3>
            <a href="/payment">Kembali</a>
        </div>
        @endforeach
    </div>
    </center>

</body>
</html>



