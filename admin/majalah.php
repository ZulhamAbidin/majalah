<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$dataCount = 10;
$page = getPage();
$first = $page > 1 ? ($page * $dataCount) - $dataCount : 0;

$previousPage = $page - 1;
$nextPage = $page + 1;

$data = query_select("majalah", [
	"limit" => "$first, $dataCount",
]);

$hal = "Majalah";
 ?>

<!DOCTYPE html>
<html lang="en">

<?php partials("head.php") ?>

<style>
    .judul-col {
        min-width: 150px !important; /* Set minimum width */
        max-width: 300px !important; /* Set maximum width */
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important; /* Add ellipsis if the text overflows */
    }
</style>


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
							</ul>
						</div>
						<div class="col-md-6">
							<div class="page-header-title">
								<h2 class="mb-0">Majalah</h2>
							</div>
						</div>
						<div class="col-md-6">
							<div class="text-md-end mt-3 mt-md-0">
								<a href="majalah-add.php" class="btn btn-primary">+ Tambah Majalah</a>
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

							<div class="table-responsive dt-responsive">
								<table id="datas" class="table align-items-center ">
									<thead>
										<tr>
											<th>No.</th>
											<th>Judul</th>
											<th>Edisi</th>
											<th>Harga Digital</th>
											<th>Harga Cetak</th>
											<th>Harga Cetak Dan Digital</th>
											<th style="width: 150px" class="text-center">Aksi</th>
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

		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js">
		</script>
		<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		<script>
			$(document).ready(function () {
				var table = $('#datas').DataTable({
					"processing": true,
					"serverSide": false,
					"ajax": {
						"url": "controller/get-majalah.php",
						"type": "GET",
						"dataSrc": "data"
					},
					"columns": [
                { "data": "id_majalah" },
                { "data": "judul", "className": "judul-col" },
                { "data": "edisi" },
                {
                    "data": "harga_digital",
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                },
                {
                    "data": "harga_cetak",
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                },
                {
                    "data": "harga_keduanya",
                    "render": $.fn.dataTable.render.number(',', '.', 0, 'Rp ')
                },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="majalah-detail.php?id=' + row.id_majalah +
                            '" class="btn btn-info">Detail</a> ' +
                            '<a href="majalah-edit.php?id=' + row.id_majalah +
                            '" class="btn btn-primary">Edit</a> ' +
                            '<button class="btn btn-danger btn-delete" data-id="' + row.id_majalah + '">Delete</button>';
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
								url: 'controller/delete-majalah.php',
								type: 'POST',
								data: {
									id_majalah: id
								},
								success: function (response) {
									Swal.fire(
										'Dihapus!',
										'Data Majalah telah dihapus.',
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
