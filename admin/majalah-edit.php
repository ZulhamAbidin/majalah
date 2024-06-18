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

if (requestMethod() == "POST") {

  $data = validate(["judul", "edisi", "desk", "harga_digital", "harga_cetak", "harga_keduanya"]);

  if ($data) {
    if (File::has("isi")) {
      $isiOld = $item["isi"];
      File::delete("assets/img/" . $isiOld);
      $filename = File::randomName() . File::getExt("isi");
      File::save("isi", "assets/img/$filename");
      $data["isi"] = $filename;
    }

    if (File::has("cover")) {
      $coverOld = $item["cover"];
      File::delete("assets/img/" . $coverOld);
      $cover = File::randomName() . File::getExt("cover");
      File::save("cover", "assets/img/$cover");
      $data["cover"] = $cover;
    }

    $data["harga_digital"] = preg_replace("/[^0-9]/", "", $data["harga_digital"]);
    $data["harga_cetak"] = preg_replace("/[^0-9]/", "", $data["harga_cetak"]);
    $data["harga_keduanya"] = preg_replace("/[^0-9]/", "", $data["harga_keduanya"]);

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

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">

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
                <li class="breadcrumb-item"><a href="javascript: void(0)">Majalah</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0)">Tambah</a></li>
              </ul>
            </div>
            <div class="col-md-12">
              <div class="page-header-title">
                <h2 class="mb-0">Majalah Tambah</h2>
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
                  <div class="col-12 col-md-11">
                    <label class="mb-2" for="judul">Judul</label>
                    <input type="text" value="<?= old("judul", $item["judul"]) ?>" class="form-control" placeholder="Judul" name="judul" required>
                  </div>
                  <div class="col-12 col-md-1">
                    <label class="mb-2" for="edisi">Edisi</label>
                    <input type="number" value="<?= old("edisi", $item["edisi"]) ?>" class="form-control" placeholder="Edisi" name="edisi" required>
                  </div>
                  <div class="col-12 col-md-4 mt-3">
                    <label class="mb-2" for="harga_digital">Harga Digital</label>
                    <input type="text" class="form-control harga-input" id="harga_digital" name="harga_digital" value="<?= number_format($item["harga_digital"], 0, ',', '.') ?>" placeholder="Harga Digital" required>
                  </div>
                  <div class="col-12 col-md-4 mt-3">
                    <label class="mb-2" for="harga_cetak">Harga Cetak</label>
                    <input type="text" class="form-control harga-input" id="harga_cetak" name="harga_cetak" value="<?= number_format($item["harga_cetak"], 0, ',', '.') ?>" placeholder="Harga Cetak" required>
                  </div>
                  <div class="col-12 col-md-4 mt-3">
                    <label class="mb-2" for="harga_keduanya">Harga Keduanya</label>
                    <input type="text" class="form-control harga-input" id="harga_keduanya" name="harga_keduanya" value="<?= number_format($item["harga_keduanya"], 0, ',', '.') ?>" placeholder="Harga Keduanya" required>
                  </div>
                  <div class="col-12 col-md-12 mt-3">
                    <label class="mb-2" for="desk">Desk</label>
                    <input type="text" value="<?= old("desk", $item["desk"]) ?>" class="form-control" placeholder="Desk" name="desk" required>
                  </div>
                  <div class="col-12 col-md-6 mt-3">
                    <label class="mb-2" for="isi">Isi</label>
                    <input type="file" class="form-control" placeholder="Isi" name="isi">
                  </div>
                  <div class="col-12 col-md-6 mt-3">
                    <label class="mb-2" for="cover">Cover Majalah</label>
                    <input type="file" class="form-control" placeholder="Cover Majalah Baru" name="cover">
                  </div>
                  <div class="col-12 col-md-12 mt-2">
                    <div class="text-end">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <?php partials("footer.php") ?>
  <?php partials("end.php") ?>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.harga-input').forEach(input => {
        input.value = formatRupiah(input.value.replace(/\D/g, ''));
      });

      document.querySelectorAll('.harga-input').forEach(input => {
        input.addEventListener('input', function () {
          this.value = this.value.replace(/\D/g, '');
          updateRupiahFormat(this); 
        });
      });
    });

    function formatRupiah(angka) {
      if (typeof angka !== 'string') {
        return '';
      }
      return 'Rp. ' + angka.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
    }

    function updateRupiahFormat(input) {
      const formattedValue = formatRupiah(input.value.replace(/\D/g, ''));
      input.value = formattedValue;
    }
  </script>

</body>

</html>
