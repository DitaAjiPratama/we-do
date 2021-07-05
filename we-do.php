<?php

function wd_create_db($h, $u, $p, $db) {
  $loc = file_get_contents($db);
  $c = new mysqli($h,$u,$p);
  $c -> multi_query($loc);
}

function wd_connect_db($h, $u, $p, $db) {
  $c = new mysqli($h,$u,$p,$db);
  while($c -> connect_errno) exit($c -> connect_error);
  return $c;
}

function wd_auth_query($c, $t, $u, $uv, $p, $pv) {
  return mysqli_query($c, "SELECT * FROM $t WHERE $u = '$uv' AND $p = '$pv' ");
}

function wd_auth_check($q) {
  if (mysqli_num_rows($q) == 1) return true;
  else return false;
}

function wd_get_auth_attr($q, $a) {
  while($r = mysqli_fetch_assoc($q)) $attr = $r[$a];
  return $attr;
}

function wd_logout($p, $v, $l) {
  if ( isset($p) ) if ($p == $v) {
    session_destroy();
    header("location:$l");
  }
}

?>
