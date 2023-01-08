<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        * {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
    <header style="margin-left: 10%">
        <div class="header" style="display: flex;">
            <img src="assets/images/logo-wk.png" style="padding: 25px 15px; width: 100px; height: 100px;">
            <h3 style="padding: 20px 0px">PANITIA PENERIMAAN PESERTA DIDIK BARU <br> SMK WIKRAMA BOGOR TP.2023-2024</h3>
        </div>
            <p style="margin-top: -60px; margin-left: 21%; font-size: 12px">Jl. Raya Wangun, Sindangsari, Kec. Bogor Tim., Kota Bogor, Jawa Barat <br> Email: prohumasi@smkwikrama.sch.id | Website: https://smkwikrama.sch.id/</p>
    </header>
    <br><br>
    <div class="body">
        <center>
            <h3>TANDA BUKTI PEMBAYARAN</h3>
            <h3 style="margin-top: -10px">SMK Wikrama Bogor TP. 2023-2024</h3>
        </center>
        <br>
            <div class="isi-satu">
                @foreach ($ppdb as $item)

                @endforeach

                <p style="font-size: 18px; font-weight: 600; background: #eee;">I. BIODATA CALON PESERTA DIDIK</p>
                <p style="font-size: 12px;">TANGGAL          : {{ $item['created_at']->format('j F, Y')}}</p>
                <p style="font-size: 12px;">NOMOR SELEKSI    : {{ $item->id }}</p>
                <p style="font-size: 12px;">NAMA LENGKAP     : {{ $item->name }}</p>
                <p style="font-size: 12px;">NISN             : {{ $item->nisn }}</p>
                <p style="font-size: 12px;">ASAL SEKOLAH     : {{ $item->school }}</p>
                <p style="font-size: 12px;">No. HP           : {{ $item->tlp }}</p>
                <p style="font-size: 12px;">EMAIL            : {{ $item->email }}</p>
                <p style="font-size: 12px;">NO HP AYAH       : {{ $item->papa }}</p>
                <p style="font-size: 12px;">NO HP IBU        : {{ $item->mama }}</p>

            </div>
            <br>
            <div class="isi-dua">
                <p style="font-size: 18px; font-weight: 600; background: #eee;">II. INFORMASI DAN PERSYARATAN</p>
                <p style="font-size: 12px; font-weight: 600;">A. Akun Anda</p>
                <p style="font-size: 12px; margin-top: -10px;">Akses <a href="#">ppdb-smkwikrama/student</a>, login gunakan</p>
                <p style="font-size: 12px; margin-top: -10px;">Email: {{ $item->email }}</p>
                <p style="font-size: 12px; margin-top: -10px;">Password: {{ $item->nisn }}</p>

                <p style="margin-top: -10px;">Akun ini digunakan untuk mengecek status pendaftaran pada SIM PPDB SMK Wikrama Bogor.</p>
                <p style="font-size: 12px; font-weight: 600; padding: 10px 0px 0px;">B. Foto/Scan Dokumen yang Harus Dipersiapkan</p>
                <p style="font-size: 12px; margin-top: -10px;">1. Persyaratan satu</p>
                <p style="font-size: 12px; margin-top: -10px;">2. Persyaratan dua</p>
                <p style="font-size: 12px; margin-top: -10px;">3. Persyaratan tiga</p>
                <p style="font-size: 12px; font-weight: 600; padding: 10px 0px 0px;">C. Biaya Seleksi</p>
                <p style="font-size: 12px; margin-top: -10px;">Pembayaran uang seleksi sebesar Rp. 200.000 melalui transfer bank: <br>
                Bank BNI: 123456789 A.N SMK Wikrama Sekolah.</p>
            </div>
    </div>
    <script>
		window.print();
	</script>


</body>
</html>
