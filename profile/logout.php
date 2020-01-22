<?php 
session_start();
unset($_SESSION["id"]);
unset($_SESSION["user_name"]);
$_SESSION["unauthorize"] = true;
header("Location: ../index.php");
die();
?>