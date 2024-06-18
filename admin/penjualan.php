<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}
$hal = "Data Kategori";
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

	<style>
		.majalah-column {
			max-width: 200px !important;
			padding: 10px !important;
			white-space: normal !important;
			word-break: break-word !important;
			overflow-wrap: break-word !important;
		}
	</style>

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
								<li class="breadcrumb-item"><a href="javascript: void(0)">Penjualan</a></li>
							</ul>
						</div>
						<div class="col-md-6">
							<div class="page-header-title">
								<h2 class="mb-0">Penjualan</h2>
							</div>
						</div>
					</div>
				</div>
			</div>

			<?php alert(); ?>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-body">
							<div class="table-responsive">
								<table id="datas" class="table align-items-center ">
									<thead>
										<tr>
											<th>No.</th>
											<th>Subscriber</th>
											<th>Metode <br> Pembayaran</th>
											<th>Majalah</th>
											<th>Harga</th>
											<th>Status</th>
											<th style="width: 150px">Aksi</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"> </script>
	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		$(document).ready(function () {

			var table = $('#datas').DataTable({
				"processing": true,
				"serverSide": false,
				"ajax": {
					"url": "controller/get-penjualan.php",
					"type": "GET",
					"dataSrc": "data"
				},
				"columns": [{
						"data": "id_p",
						"title": "No."
					},
					{
						"data": "subscriber_nama", // diambil dari tabel subscriber kolom nama
						"title": "Subscriber"
					},
					{
						"data": "metode_pembayaran", // diambil dari tabel penjualan kolom metode pembayaran
						"title": "Metode Pembayaran"
					},
					{
						"data": "judul_majalah", // diambil dari tabel majalah kolom judul 
						"title": "Majalah",
						"className": "majalah-column" // Tambahkan kelas khusus
					},
					{
						"data": "harga", // diambil dari tabel penjualan kolom harga 
						"title": "Harga"
					},
					{
						"data": "status_pembayaran", // diambil dari tabel penjualan kolom  status_pembayaran
						"title": "Status Pembayaran",
						"render": function (data, type, row) {
							return (data == 1) ? 'Lunas' : 'Belum Lunas';
						}
					},
					{
						"data": null,
						"title": "Aksi",
						"render": function (data, type, row) {
							return '<button class="btn btn-danger btn-delete" data-id="' + row.id_p +
								'">Hapus</button>';
						}
					}
				],
				"language": {
					"emptyTable": "Belum ada data.",
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

			$('#datas').on('click', '.btn-delete', function () {
				var id = $(this).data('id');

				Swal.fire({
					title: 'Apakah Anda yakin?',
					text: "Data ini tidak dapat dikembalikan!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, hapus!'
				}).then((result) => {
					if (result.isConfirmed) {
						$.ajax({
							url: 'controller/delete-penjualan.php',
							type: 'POST',
							data: {
								id_penjualan: id
							},
							success: function (response) {
								Swal.fire(
									'Dihapus!',
									'Data penjualan telah dihapus.',
									'success'
								);
								table.ajax.reload();
							},
							error: function (xhr, status, error) {
								Swal.fire(
									'Error!',
									'Terdapat kesalahan saat menghapus data.',
									'error'
								);
							}
						});
					}
				});
			});


			var toastEl = document.querySelector('.toast');
			if (toastEl) {
				var toast = new bootstrap.Toast(toastEl);
				toast.show();
			}
		});
	</script>

	<?php partials("footer.php") ?>
	<?php partials("end.php") ?>
</body>

</html>