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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Kategori</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="page-header-title">
                                <h2 class="mb-0">Kategori</h2>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-md-end mt-3 mt-md-0">
                                <a href="kategori-add.php" class="btn btn-primary">+ Tambah Kategori</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">


                            <?php toast(); ?>

                            <form role="form" method="POST" enctype="multipart/form-data">

                                <div class="row">
                                    <div class="mb-3 col-12">
                                        <label for="" class="mb-2">Judul</label>
                                        <input type="text" value="<?= old('judul', $item['judul']) ?>"
                                            class="form-control" placeholder="Judul" name="judul">
                                    </div>

                                    <div class="mb-3 col-4">
                                        <label for="" class="mb-2">Gambar Baru</label>
                                        <input type="file" value="<?= old('gambar') ?>" class="form-control"
                                            placeholder="gambar" name="gambar">
                                    </div>

                                    <div class="mb-3 col-4">
                                        <label for="" class="mb-2">Penulis</label>
                                        <input type="text" value="<?= old('penulis', $item['penulis']) ?>"
                                            class="form-control" placeholder="Penulis" name="penulis">
                                    </div>

                                    <div class="mb-3 col-4">
                                        <label for="t class="mb-2"anggal_publish">Tanggal Publish</label>
                                        <input type="datetime-local"
                                            value="<?= date('Y-m-d\TH:i', strtotime($item['tanggal_publish'])) ?>"
                                            class="form-control" id="tanggal_publish" name="tanggal_publish">
                                    </div>

                                    <div class="mb-3 col-12">
                                        <label for="i class="mb-2"d_kategori">Kategori</label>
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
                                    </div>

                                    <div class="mb-3 col-12">
                                        <label for="" class="mb-2">Isi</label>
                                        <textarea class="form-control mb-3" name="isi" rows="4" cols="5"
                                            id="editor"><?= old('isi', $item['isi']) ?></textarea>
                                    </div>

                                    <div class="mb-3 col-12 text-end mt-4">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
