<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$dataCount = 10;
$page = getPage();
$first = $page > 1 ? ($page * $dataCount) - $dataCount : 0;

$previousPage = $page - 1;
$nextPage = $page + 1;

$id = get("id");

$data = query_select("penjualan", [
	"join" => "majalah ON majalah.id_majalah = penjualan.id_majalah JOIN subscriber ON penjualan.id_sub = subscriber.id_sub",
	"limit" => "$first, $dataCount",
	"where" => "penjualan.id_p = '$id'",
]);

$hal = "Penjualan";
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
	              <h6 class="mb-2">Bukti Pembayaran Majalah</h6>
            	</div>

            	<?php alert(); ?>

            	<a href="penjualan.php" class="btn btn-secondary"> Kembali</a>

	            <div class="row">
					<div class="col-12 text-center">
						<p>Metode Pembayaran</p>
						<h1 class="mb-2"><?= $data[0]["metode_pembayaran"] ?></h1>
	            	</div>

	            	<center>
					<div class="col-md-12">
	            		<img src="../assets/img/<?= $data[0]["bukti_pembayaran"] ?>" class="img-fluid" alt="">
	            	</div>

	            	<div class="col-md-12">
	            		<?php if ($data[0]["status_pembayaran"] == 2): ?>
		            		<a href="konfirmasi.php?id=<?= $id ?>&data=acc" class="btn btn-success">Konfimasi Pembayaran</a>
		            		<a href="konfirmasi.php?id=<?= $id ?>&data=tolak" class="btn btn-danger">Tolak Pembayaran</a>
		            	<?php elseif ($data[0]["status_pembayaran"] == 1) : ?>
		            		<a href="konfirmasi.php?id=<?= $id ?>&data=tolak" class="btn btn-danger">Tolak Pembayaran</a>
		            	<?php elseif ($data[0]["status_pembayaran"] == 3) : ?>
		            		<a href="konfirmasi.php?id=<?= $id ?>&data=acc" class="btn btn-success">Konfimasi Pembayaran</a>
	            		<?php endif ?>
	            	</div>
					</center>

	            </div>
            	
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