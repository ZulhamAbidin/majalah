<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

if (requestMethod() == "POST" )  {

  $data = validate(["judul", "isi", "penulis", "tanggal_publish", "id_kategori"]);

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

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
  data-pc-theme="light">

  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>

  <?php partials("aside.php") ?>
  <?php partials("nav.php") ?>

  <div class="pc-container">
    <div class="pc-content">

      <div class="page-header">
        <div class="page-block">
          <div class="row align-items-center">
            <div class="col-md-12">
              <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Berita</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah</a></li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Berita Tambah</h2>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">

        <div class="col-sm-12">
          <div class="card">

            <div class="card-body">

              <?php alert(); ?>

              <form role="form" method="POST" enctype="multipart/form-data">
                <div class="row">

                  <div class="mb-3 mt-2 col-12">
                    <label class="mb-2" for="">Judul</label>
                    <input type="text" value="" class="form-control" placeholder="Judul" name="judul">
                  </div>

                  <div class="mb-3 mt-2 col-4">
                    <label class="mb-2" for="">Gambar</label>
                    <input type="file" value="" class="form-control" placeholder="gambar" name="gambar">
                  </div>

                  <div class="mb-3 mt-2 col-4">
                    <label class="mb-2" for="">Penulis</label>
                    <input type="text" value="" class="form-control" placeholder="penulis" name="penulis">
                  </div>

                  <div class="mb-3 mt-2 col-4">
                    <label class="mb-2" for="tanggal_publish">Tanggal Publish</label>
                    <input type="datetime-local" class="form-control" id="tanggal_publish" name="tanggal_publish">
                  </div>

                  <div class="mb-3 mt-2 col-12">
                    <label class="mb-2" for="id_kategori">Kategori</label>
                    <select class="form-control" id="id_kategori" name="id_kategori">
                      <?php
                    
                      $sql = "SELECT id_kategori, nama FROM kategori";
                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<option value='" . $row['id_kategori'] . "'>" . $row['nama'] . "</option>";
                          }
                      } else {
                          echo "<option value=''>Tidak ada kategori tersedia</option>";
                      }
                      ?>
                    </select>
                  </div>

                  <div class="mb-3 mt-2 col-12">
                    <label class="mb-2" for="isi">Isi</label>
                    <textarea class="form-control mb-3" name="isi" id="editor"><?= old("isi") ?></textarea>
                  </div>

                  <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                  </div>

                </div>
              </form>

            </div>
          </div>
        </div>

      </div>

    </div>
  </div>

  <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

  <script src="assets/js/plugins/ckeditor/classic/ckeditor.js"></script>

  <script>
    ClassicEditor
      .create(document.querySelector('#editor'))
      .then(editor => {
        console.log(editor);
      })
      .catch(error => {
        console.error(error);
      });
  </script>

  <?php partials("footer.php") ?>
  <?php partials("end.php") ?>

</body>

</html>