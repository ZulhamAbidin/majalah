<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("majalah", ["where" => "id_majalah = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("majalah.php");
  die;
}

$hal = "Majalah";
 ?>

<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>

  <?php partials("aside.php") ?>
  
  <main class="main-content position-relative border-radius-lg ">

    <!-- Navbar -->
    <?php partials("nav.php") ?>  
    <!-- End Navbar -->

    <div class="container-fluid py-4">
      <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card " style="min-height: 70vh">
            <div class="card-body">


            	<div class="d-flex justify-content-between">
	              <h6 class="mb-2">Detail Majalah</h6>
            		<a href="majalah.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
            	</div>

            	<?php alert(); ?>
              <style>
                .data td {
                  padding: 4px;
                  padding-right: 20px;
                  vertical-align: top;
                }
              </style>
              <table class="data">
                <tr>
                  <td>Judul</td>
                  <td><?= $item["judul"] ?></td>
                </tr>
                <tr>
                  <td>Edisi</td>
                  <td><?= $item["edisi"] ?></td>
                </tr>
                 <tr>
                  <td>Harga Digital </td>
                  <td><?= rp($item["harga_digital"]) ?></td>
                </tr>
                <tr>
                  <td>Harga Cetak </td>
                  <td><?= rp($item["harga_cetak"]) ?></td>
                </tr>
                <tr>
                  <td>Harga Cetak Dan Digital </td>
                  <td><?= rp($item["harga_keduanya"]) ?></td>
                </tr>
                <tr>
                  <td>Desk</td>
                  <td><?= $item["desk"] ?></td>
                </tr>
                <tr>
                  <td>Isi</td>
                  <td>
                    <a class="btn btn-sm btn-info" href="majalah-lihat.php?id=<?= $item["id_majalah"] ?>">Lihat Malajah</a>
                    </td>
                </tr>
                <tr>
                  <td>Cover</td>
                  <td>
                    <img src="assets/img/<?= $item['cover'] ?>" style="width: 300px;" alt="">
                  </td>
                </tr>
              </table>

            </div>
          </div>
        </div>
        
      </div>

      <?php partials("footer.php") ?>  

    </div>

  </main>
  
  <?php partials("end.php") ?>  
</body>

</html>