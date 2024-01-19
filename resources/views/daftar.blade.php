<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content=""/>
    <title>PPDB SMK WIKRAMA BOGOR</title>
    <link rel="stylesheet" href="assets/css/daftar.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>
  <body>

    <section class="container">
      <header>Formulir PPDB SMK Wikrama Bogor</header>
      @csrf
      <form action="/store" method="POST" class="form">
       <div class="input-box">
          <label>NISN</label>
          <input type="integer" placeholder="Masukkan NISN" name="nisn" id="nisn" required />
        </div>

        <div class="input-box">
          <label>Nama Lengkap</label>
          <input type="text" placeholder="Masukkan Nama Lengkap" name="name" id="name" required />
        </div>

        <div class="gender-box">
        <h3>Jenis Kelamin</h3>
          <div class="gender-option">
            <div class="gender">
              <input type="radio" id="check-male" name="gender" id="gender" value="Perempuan"/>
              <label for="check-male">Perempuan</label>
            </div>
            <div class="gender">
              <input type="radio" id="check-female" name="gender" id="gender" value="Laki-laki"/>
              <label for="check-female">Laki-laki</label>
            </div>
          </div>
        </div>

        <div class="input-box">
          <label>Asal Sekolah</label>
          <br>
              <select id="sekolah" onchange="tampil()" name="school">
                <option value="MTs AL ASMAAUL HUSNA">MTs AL ASMAAUL HUSNA</option>
                <option value="MTs Ar-Rasyidy">MTs Ar-Rasyidy</option>
                <option value="MTs AR-ROZZAAQ">MTs AR-ROZZAAQ</option>
                <option value="MTs Assalaam">MTs Assalaam</option>
                <option value="MTs Balighul Hikmah">MTs Balighul Hikmah</option>
                <option value="MTs Darul Irsyad">MTs Darul Irsyad</option>
                <option value="MTs EL ALAMIA">MTs EL ALAMIA</option>
                <option value="lainnya">Lainnya</option>
              </select>
        </div>

        <div id="tampil" class="input-box" name="sekolah"></div>




        <div class="input-box">
          <label>Email</label>
          <input type="email" placeholder="Masukkan Email" name="email" required />
        </div>

        <div class="input-box">
          <div class="input-box">
            <label>Jurusan</label>
            <input type="text" placeholder="Masukkan Jurusan" name="major" required />
          </div>
        </div>
        @csrf
        <br>
        <div class="btn">
        <button type="submit" value="kirim" onclick="kirim()">Registrasi
        </button>
        <br>
        <a href="/" class="button">Back</a>
        </div>


      </form>
    </section>
        <!-- wajib jquery  -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
        <!-- js untuk select2  -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#sekolah").select2({
                placeholder: "Please Select"
            });
        });
    </script>
<script>
    function tampil() {
           var sekolah = document.getElementById("sekolah").value
           console.log(sekolah)
           if (sekolah == "lainnya") {
               document.getElementById("tampil").innerHTML="<input type='text' id='sekolah' placeholder='Tambah Data Asal Sekolah'>";
           }
           else {
               document.getElementById("tampil").innerHTML="";
           }
       }
</script>




  </body>
</html>
