<?php
const PARTIALS_DIR_NAME = 'partials';
$partialsPath = null;

function checkPartialsPath(): void
{

  global $partialsPath;

  if (!$partialsPath) {

    $path = '';
    $i = 5;

    while (!is_dir($path . PARTIALS_DIR_NAME)) {
      $path .= "../";
      $i--;
      if ($i < 0) {
        break;
      }
    }

    $partialsPath = $path . PARTIALS_DIR_NAME;
  }
}

function partials(string $filename): void
{

  global $partialsPath;

  checkPartialsPath();

  include "$partialsPath/$filename";
}


