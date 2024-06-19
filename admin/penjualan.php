<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}
$hal = "Penjualan";
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

			<!-- Dropdown filter -->
			<div class="row mb-3">
				<div class="col-md-3">
					<label for="status-filter" class="form-label">Filter Status Pembayaran:</label>
					<select id="status-filter" class="form-select">
						<option value="">Semua</option>
						<option value="Lunas">Lunas</option>
						<option value="Menunggu Konfirmasi">Menunggu Konfirmasi</option>
						<option value="Pembayaran Ditolak">Pembayaran Ditolak</option>
						<option value="Belum Bayar">Belum Bayar</option>
					</select>
				</div>
			</div>

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
					"dataSrc": "datas"
				},
				"columns": [{
						"data": "id_p",
						"title": "No."
					},
					{
						"data": "subscriber_nama",
						"title": "Subscriber"
					},
					{
						"data": "judul_majalah",
						"title": "Majalah",
						"className": "majalah-column"
					},
					{
						"data": null,
						"title": "Harga",
						"render": function (data, type, row) {
							var harga = new Intl.NumberFormat('id-ID', {
								style: 'currency',
								currency: 'IDR',
								minimumFractionDigits: 0,
								maximumFractionDigits: 0
							}).format(row.harga);

							return `${harga} - ${row.metode_pembayaran}`;
						}
					},
					{
						"data": "status_pembayaran",
						"title": "Status Pembayaran",
						"render": function (data, type, row) {
							switch (data) {
								case 1:
									return '<div class="text-success fw-bold">Lunas</div>';
								case 2:
									return '<div class="text-warning fw-bold">Menunggu Anda Melakukan Konfirmasi Pembayaran</div>';
								case 3:
									return '<div class="text-danger fw-bold">Pembayaran Ditolak Menunggu Kembali Pembayaran</div>';
								case 0:
									return '<div class="text-warning fw-bold">Belum Bayar</div>';
							}
						}
					},
					{
						"data": null,
						"title": "Aksi",
						"render": function (data, type, row) {
							var buttons =
								'<button class="btn btn-sm btn-danger btn-delete" data-id="' + row
								.id_p + '">Hapus</button>';
							switch (row.status_pembayaran) {
								case 0:
									break;
								case 1:
									break;
								case 2:
									buttons +=
										'<button class="btn btn-sm m-1 btn-success btn-confirm" data-id="' +
										row.id_p + '" data-status="1">Konfirmasi Pembayaran</button>';
								case 3:
									break;
							}
							return buttons;
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

			// Mengambil nilai unik dari kolom "Status Pembayaran"
			var uniqueStatus = table.column(5).data().unique().sort().toArray();

			// Mengisi dropdown filter dengan nilai unik yang didapat
			var statusFilter = $('#status-filter');
			$.each(uniqueStatus, function (index, value) {
				var option = $('<option></option>').attr('value', value).text(value);
				statusFilter.append(option);
			});

			// Event handler untuk perubahan pada dropdown filter
			$('#status-filter').on('change', function () {
				var status = $(this).val();

				// Terapkan filter ke DataTables
				if (status === "") {
					table.column(5).search('').draw();
				} else {
					table.column(5).search(status).draw();
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
							contentType: 'application/json',
							data: JSON.stringify({
								id_p: id
							}),
							success: function (response) {
								console.log(
									response);
								Swal.fire(
									'Dihapus!',
									'Data penjualan telah dihapus.',
									'success'
								);
								table.ajax.reload();
							},
							error: function (xhr, status, error) {
								console.log(xhr
									.responseText);
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


			$('#datas').on('click', '.btn-confirm', function () {
				var id = $(this).data('id');
				var status = $(this).data('status');

				$.ajax({
					url: 'controller/get-single-penjualan.php',
					type: 'POST',
					dataType: 'json',
					data: {
						id_p: id
					},
					success: function (response) {
						if (response.error) {
							Swal.fire('Error!', response.error, 'error');
						} else {
							var penjualan = response.penjualan;
							var buktiPembayaranUrl = 'assets/img/' + penjualan.bukti_pembayaran;

							Swal.fire({
								title: 'Konfirmasi Pembayaran',
								html: `
                        <img src="${buktiPembayaranUrl}" style="max-width: 100%; height: auto;">`,
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Ya, konfirmasi Pembayaran!',
								cancelButtonText: 'Tolak Pembayaran'
							}).then((result) => {
								if (result.isConfirmed) {
									$.ajax({
										url: 'controller/update-status.php',
										type: 'POST',
										contentType: 'application/json',
										data: JSON.stringify({
											id_p: id,
											status_pembayaran: status
										}),
										success: function (response) {
											Swal.fire('Berhasil!',
												'Status pembayaran telah diperbarui.',
												'success');
											table.ajax.reload();
										},
										error: function (xhr, status, error) {
											Swal.fire('Error!',
												'Terdapat kesalahan saat memperbarui status pembayaran.',
												'error');
										}
									});
								} else if (result.dismiss === Swal.DismissReason.cancel) {
									$.ajax({
										url: 'controller/update-status.php',
										type: 'POST',
										contentType: 'application/json',
										data: JSON.stringify({
											id_p: id,
											status_pembayaran: 3
										}),
										success: function (response) {
											Swal.fire('Pembayaran Ditolak',
												'Status pembayaran telah diubah menjadi Ditolak.',
												'info');
											table.ajax.reload();
										},
										error: function (xhr, status, error) {
											Swal.fire('Error!',
												'Terdapat kesalahan saat memperbarui status pembayaran.',
												'error');
										}
									});
								}
							});
						}
					},
					error: function (xhr, status, error) {
						Swal.fire('Error!', 'Terdapat kesalahan saat memuat data.', 'error');
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