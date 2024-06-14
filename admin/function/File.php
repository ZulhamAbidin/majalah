<?php

class File
{
  static public function randomName(): string
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < 10; $i++) {
      $index = rand(0, strlen($characters) - 1);
      $randomString .= $characters[$index];
    }

    return time() . $randomString;
  }

  static function validate(string $name, string $type)
  {
    $allowExtentions = [];

    if ($type = "img") {
      $allowExtentions = [
        "png",
        "jpg",
        "jpeg"
      ];
    }

    $file_extension = pathinfo($_FILES[$name]["name"], PATHINFO_EXTENSION);

    if (!in_array($file_extension, $allowExtentions)) {
      return false;
    } else {
      return true;
    }
  }

  static public function getExt(string $itemName): string
  {
    $ext = explode(".", $_FILES[$itemName]['name']);
    return "." . clear($ext[count($ext) - 1]);
  }

  static public function save(string $filesname, string $newName)
  {

    if (isset( $_FILES[$filesname] )) {

      $tmp_address = $_FILES[$filesname]['tmp_name'];
      if (move_uploaded_file($tmp_address, $newName)) {
        return 1;
      } else {
        return 0;
      }

    } else {

      return 0;

    }

  }

  static public function delete($path)
  {
    if ($path != '') {
      if (file_exists($path)) {
        unlink($path);
      }
    }
  }

  static public function has(string $name): bool
  {
    return (isset($_FILES[$name]) && $_FILES[$name]['name'] != '');
  }
}
