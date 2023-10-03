<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$database = "db_php"; 

$koneksi = new mysqli($servername, $username, $password, $database);

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
