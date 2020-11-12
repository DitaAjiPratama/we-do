<?php

function WeDoCreateDB($h, $u, $p, $db) {
  $loc = file_get_contents($db);
  $c = new mysqli($h,$u,$p);
  $c -> multi_query($loc);
}

function WeDoConnectDB($h, $u, $p, $db) {
  $c = new mysqli($h,$u,$p,$db);
  while($c -> connect_errno) exit($c -> connect_error);
  return $c;
}

function WeDoAuthQuery($c, $t, $u, $uv, $p, $pv) {
  return mysqli_query($c, "SELECT * FROM $t WHERE $u = '$uv' AND $p = '$pv' ");
}

function WeDoAuthCheck($q) {
  if (mysqli_num_rows($q) == 1) return true;
  else return false;
}

function WeDoGetAuthAttr($q, $a) {
  while($r = mysqli_fetch_assoc($q)) $attr = $r[$a];
  return $attr;
}

function WeDoLogout($p, $v, $l) {
  if ( isset($p) ) if ($p == $v) {
    session_destroy();
    header("location:$l");
  }
}

?>
