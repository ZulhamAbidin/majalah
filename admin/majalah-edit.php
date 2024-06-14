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

if (requestMethod() == "POST" )  {

	$data = validate(["judul", "edisi", "desk", "harga_digital", "harga_cetak", "harga_keduanya"]);

	if ($data) {

    if (File::has("isi")) {
      $isiOld = $item["isi"];
      File::delete("assets/img/" . $isiOld);

      $filename .= File::randomName() . File::getExt("isi");
      File::save("isi", "assets/img/$filename");
      $data["isi"] = $filename;
    }


    if (File::has("cover")) {
      $coverOld = $item["cover"];
      File::delete("assets/img/" . $coverOld);

      $cover .= File::randomName() . File::getExt("cover");
      File::save("cover", "assets/img/$cover");
      $data["cover"] = $cover;
    }


		query_update("majalah", $data, "id_majalah = '$id'");
		setSuccess("Berhasil Diupdate!");
		direct("majalah.php");
		die;
		
	} else {

		setError("Lengkapi Form");

	}

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
	              <h6 class="mb-2">Edit Majalah</h6>
            		<a href="majalah.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
            	</div>

            	<?php alert(); ?>

            	 <form role="form" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                	<label for="">Judul</label>
                  <input type="text" value="<?= old("judul", $item["judul"]) ?>" class="form-control" placeholder="Judul" name="judul">
                </div>

                <div class="mb-3">
                  <label for="">Edisi</label>
                  <input type="text" value="<?= old("edisi", $item["edisi"]) ?>" class="form-control" placeholder="Edisi" name="edisi">
                </div>

                <div class="mb-3">
                  <label for="">Harga Digital</label>
                  <input type="number" value="<?= old("harga_digital", $item["harga_digital"]) ?>" class="form-control" placeholder="harga digital" name="harga_digital">
                </div>

                <div class="mb-3">
                  <label for="">Harga Cetak</label>
                  <input type="number" value="<?= old("harga_cetak", $item["harga_cetak"]) ?>" class="form-control" placeholder="harga cetak" name="harga_cetak">
                </div>

                <div class="mb-3">
                  <label for="">Harga Cetak Dan Digital</label>
                  <input type="number" value="<?= old("harga_keduanya", $item["harga_keduanya"]) ?>" class="form-control" placeholder="harga keduanya" name="harga_keduanya">
                </div>

                <div class="mb-3">
                  <label for="">Desk</label>
                  <input type="text" value="<?= old("desk", $item["desk"]) ?>" class="form-control" placeholder="Desk" name="desk">
                </div>

                <div class="mb-3">
                  <label for="">Isi Baru</label>
                  <input type="file" value="<?= old("isi") ?>" class="form-control" placeholder="isi" name="isi">
                </div>

                <div class="mb-3">
                  <label for="">Cover Majalah Baru</label>
                  <input type="file" value="<?= old("cover") ?>" class="form-control" placeholder="cover" name="cover">
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