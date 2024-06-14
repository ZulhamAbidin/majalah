<?php

function connect_DB()
{
  $conn = new mysqli('localhost', 'root', '', 'computer_store');
  return $conn;
}

$conn = connect_DB();

function query_select($table = false, $select = null)
{
  global $conn;
  if ($select) {
    $result = mysqli_query($conn, "SELECT * FROM " . $table . " WHERE " . $select);
  } else {
    $result = mysqli_query($conn, "SELECT * FROM " . $table);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function query_insert($table, $data)
{
  global $conn;

  $value = "";
  $i = 1;
  foreach ($data as $val) {
    $value .= "'" . $val . "'";
    if ($i != count($data)) {
      $value .= ", ";
    }
    $i++;
  }
  unset($i);

  mysqli_query($conn, "INSERT INTO $table VALUES($value)");
  return mysqli_affected_rows($conn);
}

function query_delete($table, $where)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM $table WHERE $where");
  return mysqli_affected_rows($conn);
}

function clear($data)
{
  return htmlspecialchars($data);
}

function getListBulan()
{
  return [
    "01" => "Januari",
    "02" => "Februari",
    "03" => "Maret",
    "04" => "April",
    "05" => "Mei",
    "06" => "Juni",
    "07" => "July",
    "8" => "Agustus",
    "9" => "September",
    "10" => "Oktober",
    "11" => "November",
    "12" => "Desember",
  ];
}

function getBulanName($month)
{
  $months = getListBulan();
  return $months[$month];
}

function dateToString($date)
{
  $d = explode('-', $date);
  return $d[2] . " " . getBulanName($d[1]) . " " . $d[1];
}

function getExt($fileName)
{
  $ext = explode(".", $fileName);
  return "." . clear($ext[count($ext) - 1]);
}

function saveFile($files, $newName)
{
  if (count($files) == 1) {
    $tmp_address = '';
    foreach ($files as $key => $value) {
      $tmp_address = $value['tmp_name'];
    }

    if (move_uploaded_file($tmp_address, $newName)) {
      return 1;
    } else {
      return 0;
    }
  }
}
