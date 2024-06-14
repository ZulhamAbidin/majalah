<?php

function clear($string)
{
  return htmlspecialchars($string);
}

function get(string $name)
{
  if (isset($_GET[$name]) && $_GET[$name] != '') {
    return htmlspecialchars($_GET[$name]);
  } else {
    return false;
  }
}

function post(?string $name = null)
{
  if ($name) {
    return (isset($_POST[$name]) && $_POST[$name] != '' ) ? htmlspecialchars($_POST[$name]) : false;
  } else {
    return json_decode(json_encode($_POST));
  }
  // if (isset($_GET[$name]) && $_GET[$name] != '') {
  //   return htmlspecialchars($_GET[$name]);
  // } else {
  //   return false;
  // }
}

function session(?string $name = null)
{
  if ($name) {
    return isset($_SESSION[KEY][$name]) ? $_SESSION[KEY][$name] : false;
  } else {
    return $_SESSION[KEY];
  }
}

function submit($name): bool
{
  return isset($_POST[$name]);
}

function direct($path): void
{
  $url = "location: $path";

  header($url);
  die;
}

function isi($sting)
{
  $str = '';
  for ($i = 0; $i < 30; $i++) {
    $str .= $sting[$i];
  }

  return $str;
}

function dd($data): void
{
  echo '<pre>';
  print_r($data);
  echo '</pre>';
  die;
}

function scriptDirect(string $to, int $delay = 0): void
{
  echo "<script>
  setTimeout(() => {
    location.replace('$to');
  }, $delay);
</script>";
}

function setSuccess(string $data): void
{
  $_SESSION[KEY]['success'] = $data;
}

function setError(string $data): void
{
  $_SESSION[KEY]['error'] = $data;
}

function hasSuccess(): bool
{
  return isset($_SESSION[KEY]['success']);
}

function hasError(): bool
{
  return isset($_SESSION[KEY]['error']);
}

function success(): ?string
{
  clearFormSession();
  
  if (hasSuccess()) {
    $data = $_SESSION[KEY]['success'];
    unset($_SESSION[KEY]['success']);
    return $data;
  } else {
    return null;
  }
}

function error(): ?string
{
  if (hasError()) {
    $data = $_SESSION[KEY]['error'];
    unset($_SESSION[KEY]['error']);
    return $data;
  } else {
    return null;
  }
}

function requestMethod()
{
  return $_SERVER['REQUEST_METHOD'];
}


// money format
function rp($data): string
{
  if (is_integer($data) || is_numeric($data)) {
    return "Rp " . number_format($data, 0, ",", ".");
  } else {
    return "-";
  }
}


// get url page defaul = 0;
function getPage() 
{
  $page = get("page") && get("page") != 0  ? get("page") : 1;
  return $page;
}


function alert() {

  if (hasSuccess() || hasError()) {

    $comp = "";
    $comp .= "<div class='text-white alrt alert ";
    $comp .= (hasSuccess() ? "alert-success'" : "alert-danger'") . " role='alert'>";
    $comp .= hasSuccess() ? success() : error();
    $comp .= "</div>";
    echo $comp;

    // echo "
    // <script>
    // setTimeout(() => {
    //   document.querySelector('.alrt').remove();
    // }
    // , 7000);
    // </script>
    // ";

  }

}