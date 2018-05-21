<?php
session_start();
$_SESSION['email'] ="";
$_SESSION['login'] = "false";
header("location:index.php");
?>