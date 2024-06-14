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

$data = query_select("admin", [
	"limit" => "$first, $dataCount",
]);

$hal = "Data Admin";
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
	              <h6 class="mb-2">Admin</h6>
            		<a href="admin-add.php" class="btn btn-sm btn-primary">Tambah Admin</a>
            	</div>

            	<?php alert(); ?>

	            <div class="table-responsive">
	              <table class="table align-items-center ">
	              	<thead>
	              		<tr>
	              			<th>No.</th>
	              			<th>Nama</th>
	              			<th>Email</th>
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
	                				<td><?= $val["email"] ?></td>
	                				<td><?= $val["password"] ?></td>
	                				<td>
	                					<a href="admin-edit.php?id=<?= $val["id_admin"] ?>" class="p-1 mb-0 btn btn-sm btn-secondary">Edit</a>
	                					<a href="hapus.php?id=<?= $val["id_admin"] ?>&data=admin" class="p-1 mb-0 btn btn-sm btn-danger">Hapus</a>
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