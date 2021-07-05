<?php

include "../../we-do.php";

$con = wd_connect_db("localhost", "root", "", "wedo");

$username = $_POST["username"];
$password = $_POST["password"];
$hash     = '';
$token    = '';

$result = $con->query("SELECT token, `password` FROM auth WHERE username = '$username' ");
while( $r = $result->fetch_assoc() ) {
  $token = $r["token"];
  $hash = $r["password"];
}

if (password_verify($password, $hash)) echo "Login is success. Token for session: $token";
else echo 'Login is failed';

?>
