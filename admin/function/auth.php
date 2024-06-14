<?php

function auth($role, ?string $direct = null): void
{
  if (!isset($_SESSION['login'])) {
    $to = $direct ? $direct : "login.php";
    header("location: $to");
  }
}


function authIsAdmin()
{
  if (!isset($_SESSION[KEY]['login']) || $_SESSION[KEY]['login']["role"] != "admin") {
    unset($_SESSION[KEY]["login"]);
    direct("login.php");
    die;
  } else {
    return $_SESSION[KEY]["login"];
  }
}
