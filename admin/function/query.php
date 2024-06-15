<!-- queri.php -->

<?php

use function PHPSTORM_META\type;

function query_select($table, $role = [])
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if (isset($role['join'])) {
    $sql .= " JOIN " . $role['join'];
  }

  if (isset($role['where'])) {
    $sql .= " WHERE " . $role['where'];
  }

  if (isset($role['orderby'])) {
    $sql .= " ORDER BY " . $role['orderby'];
  }

  if (isset($role['limit'])) {
    $sql .= " LIMIT " . $role['limit'];
  }

  $result = mysqli_query($conn, $sql);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function query_find($table, $role = null)
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if ($role) {
    $sql .= " WHERE " . $role;
  }

  $result = mysqli_query($conn, $sql);

  $data = null;
  while ($row = mysqli_fetch_assoc($result)) {
    $data = $row;
  }

  return $data;
}

function query_insert($table, $data)
{
  global $conn;

  $colum = "";
  $value = "";
  $i = 1;
  foreach ($data as $col => $val) {
    $colum .= $col;
    $value .= "'" . $val . "'";
    if ($i != count($data)) {
      $value .= ", ";
      $colum .= ", ";
    }
    $i++;
  }
  unset($i);
  // echo "INSERT INTO $table ($colum) VALUES($value)";
  mysqli_query($conn, "INSERT INTO $table ($colum) VALUES($value)");
  return mysqli_affected_rows($conn);
}

function query_update($table, $data, $where)
{
  global $conn;

  $set = '';
  $i = 1;
  foreach ($data as $col => $val) {
    $set .= $col . " = '" . $val . "' ";
    if ($i != count($data)) {
      $set .= ", ";
    }

    $i++;
  }
  unset($i);

  $sql = "UPDATE $table SET $set WHERE $where";

  mysqli_query($conn, $sql);
  return mysqli_affected_rows($conn);
}

function query_delete($table, $where)
{
  global $conn;

  mysqli_query($conn, "DELETE FROM $table WHERE $where");
  return mysqli_affected_rows($conn);
}

function query_count($table, $role = [])
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if (isset($role['where'])) {
    $sql .= " WHERE " . $role['where'];
  }

  $result = mysqli_query($conn, $sql);

  return $result->num_rows;
}

function arrayWhere($table, $key, $role = [])
{
  global $conn;
  $result = null;
  $sql = "SELECT * FROM $table";

  if (isset($role['join'])) {
    $sql .= " JOIN " . $role['join'];
  }

  if (isset($role['where'])) {
    $sql .= " WHERE " . $role['where'];
  }

  if (isset($role['orderby'])) {
    $sql .= " ORDER BY " . $role['orderby'];
  }

  if (isset($role['limit'])) {
    $sql .= " LIMIT " . $role['limit'];
  }

  $result = mysqli_query($conn, $sql);
  $data = $result;

  $arrayWhere = [];

  foreach ($data as $i => $value) {
    $arrayWhere[$value[$key]][] = $value;
  }

  return $arrayWhere;
}
