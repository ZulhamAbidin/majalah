<?php
session_start();

date_default_timezone_set('Asia/Jakarta');

const KEY = '$$$_____anjsdj__21jnk__123bj1jka___12237123123__iajsndka___$$$$$';

if (!isset($_SESSION[KEY])) {
  $_SESSION[KEY] = [];
}

function query_select_raw($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  if (!$result) {
      die("Query Error: " . mysqli_error($conn));
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
      $rows[] = $row;
  }
  return $rows;
}

require_once 'db.php';
require_once 'array.php';
require_once 'auth.php';
require_once 'Request.php';
require_once 'helper.php';
require_once 'query.php';
require_once 'validation.php';
require_once 'File.php';
require_once 'session.php';
require_once 'date.php';
require_once "partials.php";
require_once "form.php";
