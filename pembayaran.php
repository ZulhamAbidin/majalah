<?php $halaman = "Majalah" ?>
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
        File::save("file", "admin/assets/img/$filename");
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
<?php require 'Comp/navbar.php'; ?>

<div class="container mt-4">
  <div class="row">
    <?php if ($majalah) : ?>
    <?php $i = 0 ?>
    <?php foreach ($majalah as $item) : ?>
    <div class="col-sm-12">
      <div class="tab-content">
        <div class="tab-pane active show" id="ecomtab-3" role="tabpanel" aria-labelledby="ecomtab-tab-3">
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body border-bottom">
                    <h5>Payment</h5>
                  </div>
                  <form action="" method="POST" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="row g-2">
                        <div class="col-6 col-md-3">
                          <div class="address-check border rounded">
                            <div class="form-check paycard">
                              <input type="radio" name="metode_pembayaran" class="form-check-input input-primary"
                                id="BRI" value="BRI" checked>
                              <label class="form-check-label d-block" for="BRI">
                                <span class="card-body p-3 d-block">
                                  <span class="d-flex align-items-start justify-content-between">
                                    <h5>Majalah Online</h5>
                                    <img width="20%" src="assets/images/application/BRI.png" alt="BRI"
                                      class="img-fluid">
                                  </span>
                                  <span class="row g-2 align-items-center justify-content-between mt-2 mb-5">
                                    <span class="col-auto">
                                      <h5 class="mb-0">6015</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">6789</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">0423</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">1562</h5>
                                    </span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-6 col-md-3">
                          <div class="address-check border rounded">
                            <div class="form-check paycard">
                              <input type="radio" name="metode_pembayaran" class="form-check-input input-primary"
                                id="BCA" value="BCA">
                              <label class="form-check-label d-block" for="BCA">
                                <span class="card-body p-3 d-block">
                                  <span class="d-flex align-items-start justify-content-between">
                                    <h5>Majalah Online</h5>
                                    <img width="20%" src="assets/images/application/BCA.png" alt="BCA"
                                      class="img-fluid">
                                  </span>
                                  <span class="row g-2 align-items-center justify-content-between mt-2 mb-5">
                                    <span class="col-auto">
                                      <h5 class="mb-0">4218</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">1544</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">5271</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">2599</h5>
                                    </span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-6 col-md-3">
                          <div class="address-check border rounded">
                            <div class="form-check paycard">
                              <input type="radio" name="metode_pembayaran" class="form-check-input input-primary"
                                id="BNI" value="BNI">
                              <label class="form-check-label d-block" for="BNI">
                                <span class="card-body p-3 d-block">
                                  <span class="d-flex align-items-start justify-content-between">
                                    <h5>Majalah Online</h5>
                                    <img width="20%" src="assets/images/application/BNI.png" alt="BNI"
                                      class="img-fluid">
                                  </span>
                                  <span class="row g-2 align-items-center justify-content-between mt-2 mb-5">
                                    <span class="col-auto">
                                      <h5 class="mb-0">5110</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">9876</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">5432</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">1098</h5>
                                    </span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="col-6 col-md-3">
                          <div class="address-check border rounded">
                            <div class="form-check paycard">
                              <input type="radio" name="metode_pembayaran" class="form-check-input input-primary"
                                id="BSI" value="BSI">
                              <label class="form-check-label d-block" for="BSI">
                                <span class="card-body p-3 d-block">
                                  <span class="d-flex align-items-start justify-content-between">
                                    <h5>Majalah Online</h5>
                                    <img width="20%" src="assets/images/application/BSI.png" alt="BSI"
                                      class="img-fluid">
                                  </span>
                                  <span class="row g-2 align-items-center justify-content-between mt-2 mb-5">
                                    <span class="col-auto">
                                      <h5 class="mb-0">3012</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">3456</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">7890</h5>
                                    </span>
                                    <span class="col-auto">
                                      <h5 class="mb-0">2109</h5>
                                    </span>
                                  </span>
                                </span>
                              </label>
                            </div>
                          </div>
                        </div>

                        <div class="col-12 mt-2 ps-3 pe-3 pt-4">
                          <?php foreach ($majalah as $item) : ?>
                          <?php if (isset($item['harga'])) : ?>
                          <?php
                            // Format harga menjadi format mata uang rupiah
                            $formatted_harga = number_format($item['harga'], 0, ',', '.');
                          ?>
                          <p>Total Yang Harus Dibayarkan: Rp. <?php echo $formatted_harga; ?></p>
                          <?php else : ?>
                          <p>Total Harga Tidak Tersedia</p>
                          <?php endif; ?>
                          <?php endforeach; ?>
                        </div>

                        <div class="col-12 mt-2 ps-3 pe-3 pt-4">
                          <div class="mb-3 row">
                            <label class="col-lg-2 col-form-label">Bukti Pembayaran :<small
                                class=" d-block text-success">Silahkan Upload Bukti Pembayaran</small></label>
                            <div class="col-lg-10"><input type="file" class="form-control" name="file"></div>
                          </div>
                          <div class="text-end btn-page mb-0 mt-4">
                            <button type="button" class="btn btn-outline-secondary">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save &amp; Continue</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
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

<?php include 'Comp/footer.php'; ?>