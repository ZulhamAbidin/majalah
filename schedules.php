<?php $halaman = "Schedules" ?>
<?php require 'Comp/header.php'; ?>
<?php require 'admin/function/init.php';?>
<?php require 'Comp/navbar.php'; ?>
<!-- <div class="col-12">
    <div class="card welcome-banner bg-blue-800">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <div class="p-4">
                        <h2 class="text-white">Pengiriman</h2>
                        <p class="text-white">
                            Produk kami digunakan di berbagai bidang, seperti fashion, teknologi,
                            kesehatan, kuliner, bisnis, wisata, dan pendidikan. Kami berkomitmen untuk menyajikan
                            konten yang menarik dan informatif kepada pembaca kami. Dengan fokus pada inovasi
                            dan kualitas, kami terus mengembangkan solusi yang relevan untuk kebutuhan industri
                            dan membawa pengalaman yang berharga bagi setiap pengguna produk kami.
                        </p>
                        <a href="majalah.php" class="btn btn-outline-light">Lihat Semua Majalah Kami</a>
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
</div> -->

<div class="container">
    <div class="row">

        <div class="col-12 mt-4">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="mb-0">Daftar Jadwal</h6>
            </div>
        </div>

        <div class="col-12 mt-4">
            <div class="table-responsive dt-responsive">
                <table id="scheduleTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Pengangkut</th>
                            <th>Nama Kapal</th>
                            <th>Nomor Perjalanan</th>
                            <th>Jalur Perdagangan</th>
                            <th>Tanggal Keberangkatan</th>
                            <th>Tanggal Kedatangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#scheduleTable').DataTable({
            "processing": true,
            "serverSide": false,
            "ajax": {
                "url": "get_schedules.php",
                "type": "POST",
                "dataSrc": "data"
            },
            "columns": [{
                    "data": "id_schedules"
                },
                {
                    "data": "CarrierName"
                },
                {
                    "data": "VesselName"
                },
                {
                    "data": "VoyageNumber"
                },
                {
                    "data": "TradeLine"
                },
                {
                    "data": "DepartureDate"
                },
                {
                    "data": "ArrivalDate"
                },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="detail-schedules.php?id=' + row.id_schedules +
                            '" class="btn btn-sm btn-primary">Detail</a>';
                    }
                }
            ],
            "language": {
                "emptyTable": "Belum ada data schedules.",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "infoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "infoFiltered": "(disaring dari total _MAX_ entri)",
                "lengthMenu": "Tampilkan _MENU_ entri",
                "loadingRecords": "Memuat...",
                "processing": "Sedang memproses...",
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang cocok ditemukan"
            }
        });
    });
</script>

<?php include 'Comp/footer.php'; ?>
