<?php
session_start();
$_SESSION['nama'] = "Bekasi";
$_SESSION['umur'] = "12";
header( "display_auth.php");
?>