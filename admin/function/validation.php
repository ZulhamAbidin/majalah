<?php

function validate(array $data)
{
  global $_POST;
  $validated = [];

  if (!isset($_SESSION['form'])) {
    $_SESSION[KEY]['form'] = [];
  }

  foreach ($data as $key) {
    if (isset($_POST[$key]) && trim($_POST[$key]) != '') {
      $_SESSION[KEY]['form'][$key] = htmlspecialchars($_POST[$key]);
    }
  }

  foreach ($data as $key) {
    if (isset($_POST[$key]) && trim($_POST[$key]) != '') {
      $validated[$key] = htmlspecialchars($_POST[$key]);
    } else {
      return false;
    }
  }

  return $validated;
}
