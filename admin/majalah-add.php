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
                                        <label class="mb-2" for="">Judul</label>
                                        <input type="text" value="<?= old('judul') ?>" class="form-control"
                                            placeholder="Judul" name="judul">
                                    </div>
                                    <div class="col-12 col-md-1">
                                        <label class="mb-2" for="">Edisi</label>
                                        <input type="number" value="<?= old('edisi') ?>" class="form-control"
                                            placeholder="Edisi" name="edisi">
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label class="mb-2" for="harga_digital">Harga Digital</label>
                                        <input type="number" class="form-control" id="harga_digital"
                                            name="harga_digital" value="" placeholder="Harga Digital" required>
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label class="mb-2" for="harga_cetak">Harga Cetak</label>
                                        <input type="number" class="form-control" id="harga_cetak" name="harga_cetak"
                                            value=" placeholder=" Harga Cetak" required>
                                    </div>
                                    <div class="col-12 col-md-4 mt-3">
                                        <label class="mb-2" for="harga_keduanya">Harga Keduanya</label>
                                        <input type="number" class="form-control" id="harga_keduanya"
                                            name="harga_keduanya" value="" placeholder="Harga Keduanya" required>
                                    </div>
                                    <div class="col-12 col-md-12 mt-3">
                                        <label class="mb-2" for="">Desk</label>
                                        <input type="text" value="<?= old('desk') ?>" class="form-control"
                                            placeholder="Desk" name="desk">
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <label class="mb-2" for="">Isi</label>
                                        <input type="file" value="<?= old('isi') ?>" class="form-control"
                                            placeholder="isi" name="isi">
                                    </div>
                                    <div class="col-12 col-md-6 mt-3">
                                        <label class="mb-2" for="">Cover Majalah</label>
                                        <input type="file" value="<?= old('cover') ?>" class="form-control"
                                            placeholder="cover" name="cover">
                                    </div>
                                    <div class="col-12 col-md-12 mt-2">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
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
</body>

</html>