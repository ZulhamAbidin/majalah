<?php
require_once 'function/init.php';

if (!isset($_SESSION[KEY]['login'])) {
    direct('login.php');
    die();
}

$id = get('id');
$item = query_select('berita', ['where' => "id_berita = '$id'"]);

if ($item) {
    $item = $item[0];
} else {
    direct('berita.php');
    die();
}

if (requestMethod() == 'POST') {
    $data = validate(['judul', 'isi', 'penulis', 'tanggal_publish', 'id_kategori']);

    if ($data) {
        $data['isi'] = $_POST['isi'];
        $data['penulis'] = $_POST['penulis'];
        $data['tanggal_publish'] = $_POST['tanggal_publish'];

        if (File::has('gambar')) {
            $oldGambar = $item['gambar'];
            File::delete('assets/img/' . $oldGambar);

            $filename .= File::randomName() . File::getExt('gambar');
            File::save('gambar', "assets/img/$filename");
            $data['gambar'] = $filename;
        }

        query_update('berita', $data, "id_berita = '$id'");
        setSuccess('Berhasil Diupdate!');
        direct('berita.php');
        die();
    } else {
        setError('Lengkapi Form');
    }
}

$hal = 'Berita';
?>

<!DOCTYPE html>
<html lang="en">

<?php partials('head.php'); ?>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>


<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <?php partials('aside.php'); ?>

    <main class="main-content position-relative border-radius-lg ">

        <?php partials('nav.php'); ?>

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card " style="min-height: 70vh">
                        <div class="card-body">

                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Edit Berita</h6>
                                <a href="berita.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
                            </div>

                            <?php alert(); ?>

                            <form role="form" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="">Judul</label>
                                    <input type="text" value="<?= old('judul', $item['judul']) ?>"
                                        class="form-control" placeholder="Judul" name="judul">
                                </div>

                                <div class="mb-3">
                                    <label for="">Gambar Baru</label>
                                    <input type="file" value="<?= old('gambar') ?>" class="form-control"
                                        placeholder="gambar" name="gambar">
                                </div>

                                <textarea class="form-control mb-3" name="isi" rows="4" cols="5" id="editor"><?= old('isi', $item['isi']) ?></textarea>

                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#editor'))
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>

<div class="mb-3">
                                    <label for="">Penulis</label>
                                    <input type="text" value="<?= old('penulis', $item['penulis']) ?>"
                                        class="form-control" placeholder="Penulis" name="penulis">
                                </div>

                                <div class="mb-3">
                                    <label for="tanggal_publish">Tanggal Publish</label>
                                    <input type="datetime-local" value="<?= date('Y-m-d\TH:i', strtotime($item['tanggal_publish'])) ?>"
                                        class="form-control" id="tanggal_publish" name="tanggal_publish">
                                </div>

                                <select class="form-control" id="id_kategori" name="id_kategori">
                                    <?php
                                    $sql = "SELECT id_kategori, nama FROM kategori";
                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $selected = ($row['id_kategori'] == $item['id_kategori']) ? "selected" : "";
                                            echo "<option value='" . $row['id_kategori'] . "' $selected>" . $row['nama'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Tidak ada kategori tersedia</option>";
                                    }
                                    ?>
                                </select>


                                <div class="text-left mt-4">
                                    <button type="submit" class="btn bg-gradient-primary btn-sm">Simpan</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>

            <?php partials('footer.php'); ?>

        </div>

    </main>

    <?php partials('end.php'); ?>
</body>
</html>