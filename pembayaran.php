<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>

<?php

require 'admin/function/init.php';
if (!isset($_SESSION[KEY]["login"])) {

  setError("Silahkan Login Terlebih Dahulu!");
  direct("login.php");
  
}

$id = get("id");

function generateRandomString($length = 5) {
  $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function generateRandomNumber($length = 3) {
  $characters = '0123456789';
  $charactersLength = strlen($characters);
  $randomNumber = '';
  for ($i = 0; $i < $length; $i++) {
    $randomNumber .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomNumber;
}

if (requestMethod() == "POST" )  {

  if (File::has("file")) {

    $data = [
      "status_pembayaran" => 2,
    ];

    $filename = "";

    if (File::has("file")) {
        $filename .= File::randomName() . File::getExt("file");
        File::save("file", "assets/img/$filename");
    }

    $data["bukti_pembayaran"] = $filename;
    $data["metode_pembayaran"] = post('metode_pembayaran');

     // Mengenerate no_transaksi
    $tgl_penjualan = date('dmY');
    $randomText = generateRandomString();
    $randomNumber = generateRandomNumber();
    $data["no_transaksi"] = $data["metode_pembayaran"] . '-' . $id . '-' . $tgl_penjualan . '-' . $randomText . $randomNumber;


    query_update("penjualan", $data, "id_p = '$id'");
    setSuccess("Bukti Pembayaran Berhasil Diupload, Silahkan Tunggu Konfirmasi Admin!");
    direct("majalah-anda.php");
    die;
    
  } else {

    setError("Lengkapi Form");

  }

}

$majalah = query_select('penjualan', 
  [
    "join" => "majalah ON majalah.id_majalah = penjualan.id_majalah",
    "where" => "penjualan.id_p = '$id'",
    "orderby" => "penjualan.id_p DESC",
  ]
);

?>

<style>
  .shadow-sm {
    box-shadow: 0px 3px 5px rgba(0, 0, 0, .15);
  }

  footer {
    text-align: center;
  }

  @media (max-width: 576px) {
    .card-title {
      font-size: 14px;
    }

    .card-text {
      font-size: 12px;
    }

    footer p {
      font-size: 10px;
    }
  }
</style>

<?php require 'Comp/navbar.php'; ?>

<style>
  .jumbotron {
    height: 200px;
    background: url('assets/img/bg.jpg');
    background-size: cover;
    background-position: 0px -300px;
  }

  .jumbotron h2,
  .jumbotron h5 {
    text-shadow: 0px 3px 5px rgba(0, 0, 0, 0.35);
  }

  .rekening-info h3 {
    display: none;
  }
</style>
<div class="jumbotron border mt-5">
  <div class="container pt-5 text-center">
    <h2 class="display-4 text-white mb-3 ">Majalah Anda</h2>
  </div>
</div>

<section class="main mt-4 pt-4" id="produk " style="min-height: 88vh;">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3">
      <h5 class="">Upload Bukti Pembayaran</h5>
      <a href="majalah-anda.php" class="btn btn-secondary text-white">Kembali</a>
    </div>
    <div class="row">

      <?php if ($majalah) : ?>

        <?php $i = 0 ?>
        <?php foreach ($majalah as $item) : ?>
          <div class="col-12 mb-4">
              
            <div class="card shadow border-0">
              <div class="card-body " style="">

                <form action="" method="POST" enctype="multipart/form-data">
                  
                  <div class="row">

                  <div class="col-md-12">
                      <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran</label>
                        <select name="metode_pembayaran" class="form-control" id="metode_pembayaran" onchange="updateRekeningInfo()">
                          <option value="BRI">BRI</option>
                          <option value="BCA">BCA</option>
                          <option value="BNI">BNI</option>
                          <option value="BSI">BSI</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="">Bukti Pembayaran</label>
                        <input type="file" name="file" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <button class="btn mt-4 btn-success">Upload</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>

            <div class="card shadow border-0 mt-4">
              <div class="card-body" style="">
                <div class="col-12">
                  <div id="rekening-info">
                    <!-- Tampil ketika dropdown BRI dipilih -->
                    <h3 class="rekening-bri">BRI 31243 1233 123</h3>
                    <h3 class="rekening-bri">A.n Admin</h3>
                    <h3 class="rekening-bri">Jumlah Yang Harus Dibayarkan : <?= $item["harga"] ?></h3>

                    <!-- Tampil ketika dropdown BCA dipilih -->
                    <h3 class="rekening-bca">BCA 31243 1233 123</h3>
                    <h3 class="rekening-bca">A.n Admin</h3>
                    <h3 class="rekening-bca">Jumlah Yang Harus Dibayarkan : <?= $item["harga"] ?></h3>

                    <!-- Tampil ketika dropdown BNI dipilih -->
                    <h3 class="rekening-bni">BNI 31243 1233 123</h3>
                    <h3 class="rekening-bni">A.n Admin</h3>
                    <h3 class="rekening-bni">Jumlah Yang Harus Dibayarkan : <?= $item["harga"] ?></h3>

                    <!-- Tampil ketika dropdown BSI dipilih -->
                    <h3 class="rekening-bsi">BSI 31243 1233 123</h3>
                    <h3 class="rekening-bsi">A.n Admin</h3>
                    <h3 class="rekening-bsi">Jumlah Yang Harus Dibayarkan : <?= $item["harga"] ?></h3>
                  </div>
                </div>
              </div>
            </div>

            </div>
          <?php $i++ ?>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>

  </div>

</section>
<script>
  function updateRekeningInfo() {
    const metodePembayaran = document.getElementById('metode_pembayaran').value;
    const rekeningElements = document.querySelectorAll('#rekening-info h3');

    rekeningElements.forEach(element => {
      element.style.display = 'none';
    });

    const rekeningToShow = document.querySelectorAll('.rekening-' + metodePembayaran.toLowerCase());
    rekeningToShow.forEach(element => {
      element.style.display = 'block';
    });
  }

  document.addEventListener("DOMContentLoaded", function() {
    updateRekeningInfo();
  });
</script>

<?php include 'Comp/footer.php'; ?>