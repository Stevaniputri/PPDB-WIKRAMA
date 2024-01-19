@extends('layout')
@section('content')
<center>
    <div class="welcome" data-aos="fade-top" data-aos-delay="900">
        <h2>Hi, {{Auth::user()->name}}!</h2>
        <h4>{{count($users)}} Total Data</h4>
    </div>
    <br>

    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Data Peminjaman Laptop</h2>
      </div>
        <table>
            <thead>
                <tr>
                  <td scope="col">NISN</td>
                  <td scope="col">Nama</td>
                  <td scope="col">Sekolah</td>
                  <td scope="col">Jenis Kelamin</td>
                  <td scope="col">Jurusan</td>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
              @foreach($users as $item)
              <tr>
                <td>{{ $item->nisn }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->school}}</td>
                <td>{{ $item->gender}}</td>
                <td>PPLG</td>
        </tr>
              @endforeach
            </tbody>
        </table>
    </div>
</center>
@endsection
