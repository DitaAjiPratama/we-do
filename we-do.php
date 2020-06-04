<?php

function WeDoConnectDB($h, $u, $p, $db) {
  @$c = new mysqli($h,$u,$p,$db);
  while ($c -> connect_errno) switch ($c -> connect_error) {
    case "Unknown database '$db'":
      $loc = file_get_contents($db.".sql");
      $c2 = new mysqli($h,$u,$p);
      if ( $c2 -> multi_query($loc) ) break;
      else exit($c2 -> error); // Not work for multi_query
    default: exit($c -> connect_error);
  }
  $c = new mysqli($h,$u,$p,$db);
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
