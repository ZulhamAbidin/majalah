<?php

function hasSession(string $name): bool
{
  return isset($_SESSION[KEY][$name]);
}

function login(?string $name = null)
{
  if ($name) {
    return isset($_SESSION[KEY]['login'][$name]) ? $_SESSION[KEY]['login'][$name] : null;
  } else {
    return isset( $_SESSION[KEY]['login'] ) ? $_SESSION[KEY]['login'] : null;
  }
}
