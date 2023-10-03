<?php
include 'function.php';

$id = $_GET['id'];

if (hapusMakanan($id)) {
    echo "<script>alert('Data berhasil dihapus'); window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus'); window.location='index.php';</script>";
}
?>
