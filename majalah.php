<?php $halaman = 'Majalah Online'; ?>
<?php require 'Comp/header.php'; ?>
<?php

require 'admin/function/init.php';

$majalah = query_select('majalah', ['orderby' => 'id_majalah DESC']);

?>


<?php require 'Comp/navbar.php'; ?>
<div class="col-12">
    <div class="card welcome-banner bg-blue-800">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="p-4">
                        <h2 class="text-white">Majalah</h2>
                        <p class="text-white">
                            Majalah kami menawarkan berbagai konten yang menarik dan informatif di berbagai bidang,
                            seperti fashion, teknologi, kesehatan, kuliner, bisnis, wisata, dan pendidikan. Setiap edisi
                            kami berusaha untuk memberikan informasi terkini, panduan praktis, opini menarik, serta
                            fitur eksklusif yang akan memperkaya pengetahuan dan pengalaman membaca Anda.
                        </p>
                    </div>
                </div>
                <div class="col-sm-4 text-center">
                    <div class="img-welcome-banner">
                        <img src="assets/images/widget/welcome-banner.png" alt="Welcome Banner" class="img-fluid mt-4">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class="container title">
    <div class="d-flex justify-content-between align-items-center mb-4 pb-3">
            <h2 class="">Majalah </h2>
            <a href="majalah-anda.php" class="btn btn-warning text-white">Majalah Anda</a>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php if ($majalah) : ?>
            <?php $i = 0; ?>
            <?php foreach ($majalah as $item) : ?>
            <?php
            if ($i > 3) {
                break;
            }
            ?>
            <div class="col-sm-6 col-xl-4">
                <div class="card product-card">
                    <div class="card-img-top">
                        <a href="majalah-detail.php?id=<?= $item['id_majalah'] ?>">
                            <img src="admin/assets/img/<?= $item['cover'] ?>" alt="image" class="img-prod img-fluid">
                        </a>
                    </div>
                    <div class="card-body"><a href="majalah-detail.php?id=<?= $item['id_majalah'] ?>">
                            <p class="prod-content mb-0 text-muted"><?= $item['judul'] ?></p>
                        </a>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h4 class="mb-0 text-truncate">Edisi <b><?= $item['edisi'] ?></b></h4>
                            <!-- <div class="prod-color"><span class="bg-success"></span> <span class="bg-dark"></span></div> -->
                        </div>
                    </div>
                </div>
            </div>
            <?php $i++; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php include 'Comp/footer.php'; ?>
