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

$data = query_select("Subscriber", [
	"limit" => "$first, $dataCount",
]);

$hal = "Subscriber";
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
	              <h6 class="mb-2">Data Subscriber</h6>
            		<a href="subscriber-add.php" class="btn btn-sm btn-primary">Tambah Subscriber</a>
            	</div>

            	<?php alert(); ?>

	            <div class="table-responsive">
	              <table class="table align-items-center ">
	              	<thead>
	              		<tr>
	              			<th>No.</th>
	              			<th>Nama</th>
	              			<th>Alamat</th>
	              			<th>Email</th>
	              			<th>No. Telp</th>
	              			<th>PIC</th>
	              			<th>Username</th>
	              			<th>Password</th>
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
	                				<td><?= $val["alamat"] ?></td>
	                				<td><?= $val["email"] ?></td>
	                				<td><?= $val["no_telp"] ?></td>
	                				<td><?= $val["pic"] ?></td>
	                				<td><?= $val["username"] ?></td>
	                				<td><?= $val["password"] ?></td>
	                				<td>
	                					<a href="subscriber-edit.php?id=<?= $val["id_sub"] ?>" class="p-1 mb-0 btn btn-sm btn-secondary">Edit</a>
	                					<a href="hapus.php?id=<?= $val["id_sub"] ?>&data=subscriber" class="p-1 mb-0 btn btn-sm btn-danger">Hapus</a>
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