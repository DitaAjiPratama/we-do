<?php

include "../../we-do.php";

$con      = wd_connect_db("localhost", "root", "", "wedo");
$username = $_POST["username"];
$hash     = password_hash($_POST["password"], PASSWORD_DEFAULT);
$token    = sha1($username.substr($username,0,3).substr($hash,-6));
$query    = "INSERT INTO auth VALUES ('$token', '$username', '$hash')";

$con->query($query);

?>

Register done
