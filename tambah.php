<?php
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $desc = $_POST['desc'];
    $foto = $_POST['foto'];

    if (tambahMakanan($nama, $harga, $desc, $foto)) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            position: fixed;
            width: 100%;
            background-color: #3498db;
            color: #fff;
            padding: 20px 0;
            margin-bottom: 20px;
        }

        form {
            width: 80%;
            margin: 0 auto;
            margin-top: 90px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #20cc00;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #19a500;
        }

       
    </style></head>
<body>
    <h1>Tambah Data Makanan</h1>
    <form method="post">
        <label>Nama Makanan:</label>
        <input type="text" name="nama" required><br>
        <label>Harga:</label>
        <input type="number" name="harga" required><br>
        <label>Deskripsi:</label>
        <textarea name="desc" required></textarea><br>
        <label>Gambar (URL):</label>
        <input type="text" name="foto" required><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
