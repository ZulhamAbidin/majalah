<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

if (requestMethod() == "POST" )  {

	$data = validate(["nama"]);

	if ($data) {

		query_insert("tag", $data);
		setSuccess("Berhasil Ditambah!");
		direct("tag.php");
		die;
		
	} else {

		setError("Lengkapi Form");

	}

}

$hal = "Data Tag";
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
	              <h6 class="mb-2">Tag Baru</h6>
            		<a href="tag.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
            	</div>

            	<?php alert(); ?>

            	 <form role="form" method="POST">
                <div class="mb-3">
                	<label for="">Nama Tag</label>
                  <input type="text" value="<?= old("nama") ?>" class="form-control" placeholder="Nama Tag" name="nama">
                </div>
               
                <div class="text-left">
                  <button type="submit" class="btn bg-gradient-primary btn-sm">Tambah</button>
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