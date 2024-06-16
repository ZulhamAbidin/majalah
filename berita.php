<?php $halaman = "Majalah Online" ?>
<?php require 'Comp/header.php'; ?>
<?php require 'admin/function/init.php'; ?>
<?php require 'Comp/navbar.php'; ?>
<div class="col-12">
    <div class="card welcome-banner bg-blue-800">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="p-4">
                        <h2 class="text-white">Berita</h2>
                        <p class="text-white">
                            Menyajikan berita terkini dari berbagai bidang seperti politik, ekonomi, teknologi,
                            kesehatan, dan budaya. Kami berkomitmen untuk memberikan informasi yang akurat, mendalam,
                            dan terpercaya kepada pembaca kami. Dari liputan langsung hingga analisis mendalam,
                            kami memberikan pandangan yang komprehensif tentang peristiwa global dan lokal yang
                            mempengaruhi masyarakat.
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

<div class="container title mt-5">
    <div class="row justify-content-center text-center wow fadeInUp animated" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s;">
        <div class="col-md-8 col-xl-6">
            <h2 class="mb-3">Berita Terbaru</h2>
            <p class="mb-0">Temukan informasi terbaru dan terpercaya dari berbagai bidang di setiap update kami. Dari berita politik hingga teknologi, gaya hidup hingga kesehatan, kami hadir untuk memastikan Anda tetap terhubung dengan dunia.</p>
        </div>
    </div>
</div>


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

<div class="container">
    <div class="row align-items-center justify-content-center">
        <!-- Hasil pencarian akan dimasukkan di sini oleh search_berita.php -->
    </div>
</div>

<?php include 'Comp/footer.php'; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        function searchBerita(query) {
            $.ajax({
                url: 'search_berita.php',
                type: 'GET',
                data: { query: query },
                success: function(data) {
                    $('.row.align-items-center.justify-content-center').html(data);
                }
            });
        }

        searchBerita('');

        $('#searchInput').on('keyup', function() {
            let query = $(this).val();
            searchBerita(query);
        });

        $('#searchForm').on('submit', function(e) {
            e.preventDefault();
            let query = $('#searchInput').val();
            searchBerita(query);
        });
    });
</script>
