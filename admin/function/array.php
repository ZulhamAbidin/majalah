<?php

function filter(array $arr, ?array $ex = null): array
{
  $data = [];

  foreach (array_keys($arr) as $key) {
    $data[$key] = htmlspecialchars($arr[$key]);
  }

  if ($key) {
    foreach ($ex as $val) {
      if (isset($data[$val])) {
        unset($data[$val]);
      }
    }
  }

  return $data;
}

