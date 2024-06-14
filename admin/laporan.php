<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$dataCount = 5;
$page = getPage();
$first = $page > 1 ? ($page * $dataCount) - $dataCount : 0;

$data = query_select("hasil", ["join" => "dataset On hasil.id_dataset = dataset.id_dataset"]);

$hal = "Laporan";
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
	              <h6 class="mb-2">Laporan Hasil Prediksi</h6>
            	</div>

            	<?php alert(); ?>

	            <div class="table-responsive">
	              <table class="table align-items-center ">
	              	<thead>
	              		<tr>
	              			<th>No.</th>
	              			<th>Hasil Proses Prediksi</th>
	              			<th style="width: 150px">Aksi</th>
	              		</tr>
	              	</thead>
	                <tbody>

	                	<?php if ($data): ?>

	                		<?php $no = 1; ?>
	                		<?php foreach ($data as $val): ?>

	                			<tr>
	                				<td><?= $first + $no++ ?></td>
	                				<td><?= $val["nama_dataset"] ?></td>
	                				<td>
	                					<a href="cetak.php?id=<?= $val["id_dataset"] ?>" class="p-1 mb-0 btn btn-sm btn-success">Cetak Hasil</a>
	                				</td>
	                			</tr>
	                			
	                		<?php endforeach ?>

	                	<?php else: ?>

	                		<tr>
	                			<td colspan="3" class="text-center text-secondary">Belum Ada Data Yang Diproses</td>
	                		</tr>
	                		
	                	<?php endif ?>
	                  
	                </tbody>
	              </table>
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