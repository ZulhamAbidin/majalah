<?php
require_once 'function/init.php';

if (!isset($_SESSION[KEY]['login'])) {
    direct('login.php');
    die();
}

if (requestMethod() == 'POST') {
    $data = validate(['judul', 'edisi', 'desk', 'harga_digital', 'harga_cetak', 'harga_keduanya']);

    if ($data && File::has('isi') && File::has('cover')) {
        $filename = '';
        if (File::has('isi')) {
            $filename .= File::randomName() . File::getExt('isi');
            File::save('isi', "assets/img/$filename");
        }

        $data['isi'] = $filename;

        $cover = '';
        if (File::has('cover')) {
            $cover .= File::randomName() . File::getExt('cover');
            File::save('cover', "assets/img/$cover");
        }

        $data['cover'] = $cover;

        query_insert('majalah', $data);
        setSuccess('Berhasil Ditambah!');
        direct('majalah.php');
        die();
    } else {
        setError('Lengkapi Form');
    }
}

$hal = 'Majalah';
?>

<!DOCTYPE html>
<html lang="en">

<?php partials('head.php'); ?>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    <?php partials('aside.php'); ?>

    <main class="main-content position-relative border-radius-lg ">

        <!-- Navbar -->
        <?php partials('nav.php'); ?>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card " style="min-height: 70vh">
                        <div class="card-body">


                            <div class="d-flex justify-content-between">
                                <h6 class="mb-2">Majalah Baru</h6>
                                <a href="majalah.php" class="btn btn-sm bg-gradient-secondary">Kembali</a>
                            </div>

                            <?php alert(); ?>

                            <form role="form" method="POST" enctype="multipart/form-data">

                                <div class="mb-3">
                                    <label for="">Judul</label>
                                    <input type="text" value="<?= old('judul') ?>" class="form-control"
                                        placeholder="Judul" name="judul">
                                </div>
                                <div class="mb-3">
                                    <label for="">Edisi</label>
                                    <input type="text" value="<?= old('edisi') ?>" class="form-control"
                                        placeholder="Edisi" name="edisi">
                                </div>
                                <div class="mb-3">
                                    <label for="harga_digital">Harga Digital</label>
                                    <input type="number" class="form-control" id="harga_digital" name="harga_digital" value="<?= old('harga_digital') ?>" placeholder="Harga Digital" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_cetak">Harga Cetak</label>
                                    <input type="number" class="form-control" id="harga_cetak" name="harga_cetak" value="<?= old('harga_cetak') ?>" placeholder="Harga Cetak" required>
                                </div>
                                <div class="mb-3">
                                    <label for="harga_keduanya">Harga Keduanya</label>
                                    <input type="number" class="form-control" id="harga_keduanya" name="harga_keduanya" value="<?= old('harga_keduanya') ?>" placeholder="Harga Keduanya" required>
                                </div>
                                <div class="mb-3">
                                    <label for="">Desk</label>
                                    <input type="text" value="<?= old('desk') ?>" class="form-control"
                                        placeholder="Desk" name="desk">
                                </div>
                                <div class="mb-3">
                                    <label for="">Isi</label>
                                    <input type="file" value="<?= old('isi') ?>" class="form-control"
                                        placeholder="isi" name="isi">
                                </div>
                                <div class="mb-3">
                                    <label for="">Cover Majalah</label>
                                    <input type="file" value="<?= old('cover') ?>" class="form-control"
                                        placeholder="cover" name="cover">
                                </div>
                                <div class="text-left">
                                    <button type="submit" class="btn bg-gradient-primary btn-sm">Tambah</button>
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
