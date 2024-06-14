<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("admin", ["where" => "id_admin = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("admin.php");
  die;
}

$hal = "Berita";
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
	              <h6 class="mb-2">Edit Admin</h6>
            		<a href="admin.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
            	</div>

            	<?php alert(); ?>

            	 <form role="form" method="POST">
                <div class="mb-3">
                	<label for="">Nama</label>
                  <input type="text" value="<?= old("nama", $item["nama"]) ?>" class="form-control" placeholder="Nama" name="nama">
                </div>

                <div class="mb-3">
                  <label for="">Email</label>
                  <input type="email" value="<?= old("email", $item["email"]) ?>" class="form-control" placeholder="Email" name="email">
                </div>

                <div class="mb-3">
                  <label for="">Password</label>
                  <input type="password" value="<?= old("password", $item["password"]) ?>" class="form-control" placeholder="Password" name="password">
                </div>
                
                <div class="text-left">
                  <button type="submit" class="btn bg-gradient-primary btn-sm">Simpan</button>
                </div>
              </form>

	            
            	
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