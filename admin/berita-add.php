<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

if (requestMethod() == "POST" )  {

	$data = validate(["judul", "isi"]);

	if ($data && File::has("gambar")) {

    $data['isi'] = $_POST['isi'];

    $filename = "";
    if (File::has("gambar")) {
        $filename .= File::randomName() . File::getExt("gambar");
        File::save("gambar", "assets/img/$filename");
    }

    $data["gambar"] = $filename;

		query_insert("berita", $data);
		setSuccess("Berhasil Ditambah!");
		direct("berita.php");
		die;
		
	} else {

		setError("Lengkapi Form");

	}

}

$hal = "Berita";
 ?>

<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


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
	              <h6 class="mb-2">Berita Baru</h6>
            		<a href="berita.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
            	</div>

            	<?php alert(); ?>

            	 <form role="form" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                	<label for="">Judul</label>
                  <input type="text" value="<?= old("judul") ?>" class="form-control" placeholder="Judul" name="judul">
                </div>

                <div class="mb-3">
                  <label for="">Gambar</label>
                  <input type="file" value="<?= old("gambar") ?>" class="form-control" placeholder="gambar" name="gambar">
                </div>

                <textarea class="form-control mb-3" name="isi" rows="4" cols="5" id="editor"><?= old("isi") ?></textarea>

                <script>
                    ClassicEditor
                        .create( document.querySelector( '#editor' ) )
                        .catch( error => {
                            console.error( error );
                        } );
                </script>


               
                <div class="text-left mt-4">
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