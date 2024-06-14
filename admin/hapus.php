<?php 
require_once "function/init.php";

if (!isset($_SESSION[KEY]["login"])) {
  direct("login.php");
  die;
}


$id = get("id");
$data = get("data");

if ($id && $data) {

	if ($data == "admin") {

		setSuccess("Data Berhasil Dihapus!");
		query_delete("admin", "id_admin = '$id'");
		direct("admin.php");

	} else if ($data == "majalah") {

		$item = query_find("majalah", "id_majalah = '$id'");

    $isiOld = $item["isi"];
    File::delete("assets/img/" . $isiOld);
    $coverOld = $item["cover"];
    File::delete("assets/img/" . $coverOld);

		setSuccess("Data Berhasil Dihapus!");
		query_delete("majalah", "id_majalah = '$id'");
		direct("majalah.php");

	} else if ($data == "berita") {

		$item = query_find("berita", "id_berita = '$id'");

    $isiOld = $item["gambar"];
    File::delete("assets/img/" . $isiOld);

		setSuccess("Data Berhasil Dihapus!");
		query_delete("berita", "id_berita = '$id'");
		direct("berita.php");

	} else if ($data == "kategori") {

		setSuccess("Data Berhasil Dihapus!");
		query_delete("kategori", "id_kategori = '$id'");
		direct("kategori.php");

	} else if ($data == "tag") {

		setSuccess("Data Berhasil Dihapus!");
		query_delete("tag", "id_tag = '$id'");
		direct("tag.php");

	} else if ($data == "subscriber") {

		setSuccess("Data Berhasil Dihapus!");
		query_delete("subscriber", "id_sub = '$id'");
		direct("subscriber.php");

	}  else if ($data == "penjualan") {

		setSuccess("Data Berhasil Dihapus!");
		query_delete("penjualan", "id_p = '$id'");
		direct("penjualan.php");

	} 

} else {
	direct("index.php");
}

die;