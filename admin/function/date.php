<?php
function getListBulan()
{
  return [
    "01" => "Januari",
    "02" => "Februari",
    "03" => "Maret",
    "04" => "April",
    "05" => "Mei",
    "06" => "Juni",
    "07" => "July",
    "08" => "Agustus",
    "09" => "September",
    "10" => "Oktober",
    "11" => "November",
    "12" => "Desember",
  ];
}

function getBulanName($month)
{
  $months = getListBulan();
  return $months[$month];
}

function dateToString($date)
{
  $d = explode('-', $date);
  return $d[2] . " " . getBulanName($d[1]) . " " . $d[0];
}
