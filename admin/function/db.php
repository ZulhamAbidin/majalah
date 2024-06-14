<?php
function connect_DB()
{
  $conn = new mysqli('localhost', 'root', '', 'webisg');
  return $conn;
}

$conn = connect_DB();

if ($conn->connect_errno) {
  echo "Failed to connect to MySQL: " . $conn->connect_error;
  exit();
}
