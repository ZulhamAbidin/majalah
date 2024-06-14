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

$data = query_select("penjualan", [
	"join" => "majalah ON majalah.id_majalah = penjualan.id_majalah JOIN subscriber ON penjualan.id_sub = subscriber.id_sub",
	"limit" => "$first, $dataCount",
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
	              <h6 class="mb-2">Penjualan Majalah</h6>
            	</div>

            	<?php alert(); ?>

	            <div class="table-responsive">
	              <table class="table align-items-center ">
	              	<thead>
	              		<tr>
	              			<th>No.</th>
	              			<th>Subscriber</th>
							<th>Metode <br> Pembayaran</th>
	              			<th>Majalah</th>
	              			<th>Harga</th>
	              			<th>Status</th>
	              			<th style="width: 150px">Aksi</th>
	              		</tr>
	              	</thead>
	                <tbody>

	                	<?php if ($data): ?>

	                		<?php $no = 1; ?>
	                		<?php foreach ($data as $val): ?>

	                			<tr>
	                				<td><?= $first + $no++ ?></td>
	                				<td><?= $val["nama"] ?></td>
									<td><?= $val["metode_pembayaran"] ?></td>
	                				<td><?= $val["judul"] ?></td>
	                				<td><?= rp($val["harga"]) ?></td>
	                				<td>
	                					<?php if ($val["status_pembayaran"] == 0){ 
	                						echo "Menunggu Pembayaran";
	                					} else if ($val["status_pembayaran"] == 2) {
	                						echo "Menunggu Konfirmasi Admin";
	                					} else if ($val["status_pembayaran"] == 1) {
	                						echo "Sudah Bayar";
	                					} else if ($val["status_pembayaran"] == 3) {
	                						echo "Pembayaran Ditolak=";
	                					}
	                					?>
	                				</td>
	                				<td>
		                					<a href="penjualan-konfirmasi.php?id=<?= $val["id_p"] ?>" class="p-1 mb-0 btn btn-sm btn-secondary">Konfirmasi</a>
	                					<a href="hapus.php?id=<?= $val["id_p"] ?>&data=penjualan" class="p-1 mb-0 btn btn-sm btn-danger">Hapus</a>
	                				</td>
	                			</tr>
	                			
	                		<?php endforeach ?>

	                	<?php endif ?>
	                  
	                </tbody>
	              </table>

	              <?php if ($data): ?>
	              	

	              <div class="d-flex justify-content-start">
                      <div>
                          <a href="?page=<?= $previousPage ?><?= get("q") ? "&q=" . get("q") : "" ?>" class="btn btn-sm ms-2 py-1 px-2 btn-secondary <?= $page == 1 ? "disabled" : "" ?>">Prev</a>
                          <a href="?page=<?= $nextPage ?><?= get("q") ? "&q=" . get("q") : "" ?>" class="btn btn-sm ms-2 py-1 px-2 btn-primary">Next</a>
                      </div>
                  </div>
	            </div>
              <?php endif ?>
            	
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