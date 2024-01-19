@extends('layout')
@section('content')
<center>
    <div class="welcome"  data-aos="fade-top" data-aos-delay="900">
        <h2>Hi, {{Auth::user()->name}}!</h2>
        <h4>Pembayaran</h4>
    </div>
    <br><br>
    @if (Auth::user()->role == 'admin')

    {{----------------------- HALAMAN PAYMENT ADMIN ----------------------------}}

    <div class="recentOrders">
        <div class="cardHeader">
            <h2>Data Peminjaman Laptop</h2>
      </div>
        <table>
            <thead>
                <tr>
                  <td scope="col">NO</td>
                  <td scope="col">Nomor Registrasi</td>
                  <td scope="col">Nama</td>
                  <td scope="col">Bukti Pembayaran</td>
                  <td scope="col">Detail Pembayaran</td>
                  <td scope="col">Action</td>
                </tr>
            </thead>

            <tbody>
                <?php $i = 1; ?>
              @foreach($datapendaftaran as $item)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    <div class="lihat">
                        <a href="/proof/{{$item ['id']}}" style="color: blue;">Lihat</a>
                    </div>
                </td>
                <td>
                    <div class="lihat">
                        <a href="/detail" style="color: blue;">Detail</a>
                    </div>
                </td>
                <td style="display: flex; gap: 10px;">
                    @if ($item->payment == null)
                    Belum melakukan pembayaran
                    @elseif($item->payment->status == 'pending')
                    <form action="/success/{{$item['id']}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" style="background-color: orange; border: none; padding: 5px 5px 5px 5px; border-radius: 5px;">Verifikasi</button>
                    </form>
                    <form action="/failed/{{$item['id']}}" method="POST">
                        @csrf
                        @method('PATCH')
                    <button type= "submit" style="background-color: red; border: none; padding: 5px 7px 5px 5px; border-radius: 5px;">Tolak</button>
            </form>
            @elseif ($item->payment->status == 'success')
            success
            @elseif ($item->payment->status == 'failed')
            failed
            @endif
            </td>
        </tr>


              @endforeach
            </tbody>
        </table>
    </div>

    @else

{{----------------------- HALAMAN PAYMENT USER ----------------------------}}


@if($datasiswa == null)
</center>
<div class="before-tf"></div>
<p class="text-proof">Silahkan upload bukti bayar Anda di form berikut</p>
<center>
<div class="form-payment">

<form method="POST" action="{{route('uploadPembayaran')}}" enctype="multipart/form-data">
    @csrf
    <div class="user-details">
        <div class="input-box">
            <span class="details">Nama Pemilik Rekening</span>
            <input type="text" id="form3Example2" class="form-control" name="pemilik">
        </div>
        <div class="input-box">
            <span class="details">Nama Bank/Rekening</span>
            <select id="kota" name="rekening" class="kota" onchange="show()">
                <option value=""></option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
                <option value="CIMB Niaga">CIMB Niaga</option>
                <option value="CitibankIndonesia">Citibank Indonesia</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="input-box">
            <span class="details">Nominal</span>
            <input type="text" class="form-control" name="nominal" id="rupiah"/>
        </div>
    </div>
    <div class="input-box-rek" id="show">
        <div class="input-box" name="rekening"></div>
    </div>
    <div class="input-box-bukti">
        <div class="mb-3">
            <input class="form-control" type="file" name="bukti" id="bukti">
        </div>
    </div>
    <div class="button">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
@elseif($datasiswa->status == 'pending')
<div class="wait">
    <img src="assets/images/wait.svg" style="width: 300px;">
    <br>
    <span style="font-size: 20px">Pembayaran sedang diverifikasi, harap tunggu informasi selanjutnya!</span>
</div>

@elseif($datasiswa->status == 'success')
<div class="acc">
    <img src="assets/images/accept.svg" style="width: 300px;">
    <br>
    <span style="font-size: 20px">Pembayaran telah diverifikasi, silahkan melanjutkan ke proses berikutnya!</span>
</div>

@elseif($datasiswa->status == 'failed')
<div class="cancel">
    <span style="font-size: 20px">Pembayaran ditolak, silahkan lakukan ulang!</span>
    <br>
<div class="form-payment">

<form method="POST" action="{{route('update')}}" enctype="multipart/form-data">
    @csrf
    @method("PATCH")
    <div class="user-details">
        <div class="input-box">
            <span class="details">Nama Pemilik Rekening</span>
            <input type="text" id="form3Example2" class="form-control" name="pemilik">
        </div>
        <div class="input-box">
            <span class="details">Nama Bank/Rekening</span>
            <select id="kota" name="rekening" class="kota" onchange="show()">
                <option value=""></option>
                <option value="BNI">BNI</option>
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
                <option value="CIMB Niaga">CIMB Niaga</option>
                <option value="CitibankIndonesia">Citibank Indonesia</option>
                <option value="Lainnya">Lainnya</option>
            </select>
        </div>
        <div class="input-box">
            <span class="details">Nominal</span>
            <input type="text" class="form-control" name="nominal" id="rupiah"/>
        </div>
    </div>
    <div class="input-box-rek" id="show">
        <div class="input-box" name="rekening"></div>
    </div>
    <div class="input-box-bukti">
        <div class="mb-3">
            <input class="form-control" type="file" name="bukti" id="bukti">
        </div>
    </div>
    <div class="button">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</div>
</center>


@endif

@endif

        <!-- wajib jquery  -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <!-- js untuk select2  -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#kota").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
<script>
var rupiah = document.getElementById("rupiah");
rupiah.addEventListener("keyup", function(e) {
  // tambahkan 'Rp.' pada saat form di ketik
  // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
  rupiah.value = formatRupiah(this.value, "Rp. ");
});

/* Fungsi formatRupiah */
function formatRupiah(angka, prefix) {
  var number_string = angka.replace(/[^,\d]/g, "").toString(),
    split = number_string.split(","),
    sisa = split[0].length % 3,
    rupiah = split[0].substr(0, sisa),
    ribuan = split[0].substr(sisa).match(/\d{3}/gi);

  // tambahkan titik jika yang di input sudah menjadi angka ribuan
  if (ribuan) {
    separator = sisa ? "." : "";
    rupiah += separator + ribuan.join(".");
  }

  rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
  return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
}
</script>
<script>
    function show() {
       var kota = document.getElementById("kota").value
       console.log(kota)
       if (kota == "Lainnya") {
           document.getElementById("show").innerHTML="<input type='text' id='show' placeholder='Tuliskan Nama Rekening'>";
       }
       else {
           document.getElementById("show").innerHTML="";
       }
   }
 </script>

@endsection
