<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}


$id = get("id");
$data = get("data");

if ($id && $data) {

	if ($data == "acc") {

		setSuccess("Pembayaran Berhasil Dikonfirmasi!");
		query_update("penjualan", ["status_pembayaran" => 1],"id_p = '$id'");
		direct("penjualan.php");

	} else if ($data == "tolak") {

		setError("Pembayaran Berhasil Ditolak!");
		query_update("penjualan", ["status_pembayaran" => 3],"id_p = '$id'");
		direct("penjualan.php");

	} 

} else {
	direct("index.php");
}

die;