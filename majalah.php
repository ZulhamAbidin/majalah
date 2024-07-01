<?php $halaman = 'Majalah'; ?>
<?php require 'admin/function/init.php'; ?>
<?php require 'Comp/header.php'; ?>
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
    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form class="d-flex w-100" id="searchForm">
                    <input class="form-control me-2 flex-grow-1" type="search" placeholder="Cari majalah..." aria-label="Search" id="searchInput" name="query">
                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container title">
        <div class="d-flex justify-content-between align-items-center mb-4 pb-3">
            <h2 class="">Majalah </h2>
            <a href="majalah-anda.php" class="btn btn-warning text-white">Majalah Anda</a>
        </div>
    </div>
    <div class="container">
        <div class="row" id="majalahList">
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<?php include 'Comp/footer.php'; ?>
<script>
    $(document).ready(function() {
        function searchMajalah(query) {
            $.ajax({
                url: 'search_majalah.php',
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    $('#majalahList').html(data);
                }
            });
        }

        searchMajalah('');

        $('#searchInput').on('keyup', function() {
            let query = $(this).val();
            searchMajalah(query);
        });

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            let query = $('#searchInput').val();
            searchMajalah(query);
        });
    });
</script>
