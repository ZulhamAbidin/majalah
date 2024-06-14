<?php
class Model
{
  static protected $sql = "SELECT * FROM ";
  static protected $table = "";
  static protected $where = "";
  static protected $join = "";
  static protected $orderBy = "";

  static public function sql(): string
  {
    return self::$sql . " " . self::$table . " " . self::$join . " " . self::$orderBy . ";";
  }

  static public function where(array $where): void
  {
    self::$where = "$where[0] = '$where[1]'";
  }

  static public function orderBy(string $order): void
  {
    self::$orderBy = $order;
  }
}

class Pegawai extends Model
{
}
