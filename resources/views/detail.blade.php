@extends('layout')
@section('content')
<center>
    <div class="welcome"  data-aos="fade-top" data-aos-delay="900">
        <h2>Hi, {{Auth::user()->name}}!</h2>
        <h4>Pembayaran</h4>
    </div>
</center>
    <br><br>
    <div class="datasiswa" style="background-color: #222; color: white; width: 90%; margin-top: 3%; margin-left: 5%; padding: 5% 5%; border-radius: 20px">
        <h1 style="margin-left: -2%;">DATA SISWA</h1>
        <br>
        <div class="isi">
            @foreach($alldata as $item)
            <ul>
                <li>
                    <p>NISN: {{ $item->nisn}}</p>
                </li>
                <li>
                    <p>Nama Siswa: {{ $item->name}}</p>
                </li>
                <li>
                    <p>Jenis Kelamin: {{ $item->gender}}</p>
                </li>
                <li>
                    <p>Asal Sekolah: {{ $item->sekolah}}</p>
                </li>
                <li>
                    <p>Email: {{ $item->email}}</p>
                </li>
                <li>
                    <p>No. Handphone: {{ $item->tlp}}</p>
                </li>
                <li>
                    <p>No. Handphone Ayah: {{ $item->mama}}</p>
                </li>
                <li>
                    <p>No. Handphone Ibu: {{ $item->papa}}</p>
                </li>
            </ul>
            @endforeach
        </div>
    </div>
@endsection
