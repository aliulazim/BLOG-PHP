<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "blog";

$dbcon = new MySQLi($dbhost,$dbuser,$dbpass,$dbname);

if ($dbcon->connect_errno) {
     die("ERROR : ->".$dbcon->connect_error);
}



?>