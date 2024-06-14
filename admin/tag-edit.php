<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id = get("id");
$item = query_select("tag", ["where" => "id_tag = '$id'"]);

if ($item) {
  $item = $item[0];
} else {
  direct("tag.php");
  die;
}

if (requestMethod() == "POST" )  {

	$data = validate(["nama"]);

	if ($data) {

		query_update("tag", $data, "id_tag = '$id'");
		setSuccess("Berhasil Disimpan!");
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
	              <h6 class="mb-2">Edit Tag</h6>
            		<a href="tag.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
            	</div>

            	<?php alert(); ?>

            	 <form role="form" method="POST">
                <div class="mb-3">
                	<label for="">Nama Tag</label>
                  <input type="text" value="<?= old("nama", $item["nama"]) ?>" class="form-control" placeholder="Nama Kategori" name="nama">
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