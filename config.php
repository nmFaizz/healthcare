<?php 

$server = "localhost";
$dbname = "quickdoc";
$user = "root";
$password = "";

$db = mysqli_connect($server, $user, $password, $dbname);

if(!$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}


?>

