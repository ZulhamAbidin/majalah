<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}

$id_dataset = get("id");

$dataset = query_find("dataset", "id_dataset = '$id_dataset'");
$hasil = query_find("hasil", "id_dataset = '$id_dataset'");
$data = query_select("data", ["where" => "id_dataset = '$id_dataset'"]);

$hal = "Hasil";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Laporan Hasil Prediksi</title>
</head>
<body>

	<center>
		<h4>Laporan Hasil Prediksi</h4>
	</center>

	<hr>

	<style>
            		.hasil {
            			margin-bottom: 50px;
            		}
            		.hasil  td {
            			padding: 10px;
            			padding-right: 50px;
            			vertical-align: top;
            		}
            	</style>

            	<table border="0" class="hasil">
            		<tr>
            			<td>Semua Variabel Kelas</td>
            			<td>
            				P(X|Y = ('AKURAT') P(Y = 'AKURAT')
            				<br>
            				<b>
            				: <?= $hasil["nilai_akurat"] ?> x <?= $hasil["p_akurat"] ?> = <?= $hasil["nilai_akurat"] * $hasil["p_akurat"] ?>
            				</b>
            			</td>
            		</tr>
            		<tr>
            			<td></td>
            			<td>
            					P(X|Y = ('TIDAK AKURAT') P(Y = 'TIDAK AKURAT')
            					<br>
            					<b>
            				: <?= $hasil["nilai_tidak_akurat"] ?> x <?= $hasil["p_tidak_akurat"] ?> = <?= $hasil["nilai_tidak_akurat"] * $hasil["p_tidak_akurat"] ?>
            				</b>
            			</td>
            		</tr>
            		<tr>
            			<td>Hasil Per Kelas</td>
            			<td>
            				<b>
            					
            				<?php 
            				if ($hasil["nilai_tidak_akurat"] > $hasil["nilai_akurat"]) {
            					echo "P(X|Y = 'TIDAK AKURAT') > P(X|Y = 'AKURAT')";
            				} else {
            					echo "P(X|Y = 'AKURAT') > P(X|Y = 'TIDAK AKURAT')";
            				}
            				?>
            				</b>
            			</td>
            		</tr>
            		<tr>
            			<td>Hasil Pengujian</td>
            			<td>
            				Akurasi Data Akurat : <b><?= $hasil["akurat"] ?>%</b>
            				<br>
            				Akurasi Data Tidak Akurat : <b><?= $hasil["t_akurat"] ?>%</b>
            			</td>
            		</tr>
            	</table>

            	<style>
            		.table {
            			border-collapse: collapse;
            		}
            		.table td {
            			padding: 4px;

            		}
            	</style>

            	<p>Dataset :</p>

	            <div class="table-responsive">
	              <table class="table align-items-center " style="width:  100%;" border="1">
	              	<thead>
	              		<tr>
	              			<td>No.</td>
	              			<td>Nama</td>
	              			<td>No. Induk</td>
	              			<td>Jurusan</td>
	              			<td>Bidang Kerja</td>
	              			<td>Real Pekerjaan</td>
	              		</tr>
	              	</thead>
	                <tbody>

	                	<?php if ($data): ?>

	                		<?php $no = 1; ?>
	                		<?php foreach ($data as $val): ?>

	                			<tr>
	                				<td><?= $no++ ?></td>
	                				<td><?= $val["nama"] ?></td>
	                				<td><?= $val["no_induk"] ?></td>
	                				<td><?= $val["jurusan"] ?></td>
	                				<td><?= $val["bidang_kerja"] ?></td>
	                				<td><?= $val["real_kerja"] ?></td>
	                			</tr>
	                			
	                		<?php endforeach ?>

	                	<?php endif ?>
	                  
	                </tbody>
	              </table>
	            </div>
	
</body>

<script>
	print();

	setTimeout(() => {
		history.back();
	}, 2000);
</script>
</html>