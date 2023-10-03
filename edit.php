<?php
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $desc = $_POST['desc'];
    $foto = $_POST['foto'];

    if (editMakanan($id, $nama, $harga, $desc, $foto)) {
        echo "<script>alert('Data berhasil diubah'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah');</script>";
    }
}

$id = $_GET['id'];
$makanan = getMakanan();
$makanan = array_filter($makanan, function($item) use ($id) {
    return $item['id'] == $id;
});
$makanan = reset($makanan);
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
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        textarea {
            height: 100px;
        }

        input[type="submit"] {
            align-self: right;
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: #0069b0;
        }

        /* CSS untuk tombol "Kembali" */
a {
    display: inline-block;
    margin-top: 10px;
    padding: 10px;
    background-color: #3498db;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

a:hover {
    background-color: #0069b0;
}

    </style></head>
<body>
    <h1>Edit Data Makanan</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $makanan['id']; ?>">
        <label>Nama Makanan:</label>
        <input type="text" name="nama" value="<?= $makanan['nama']; ?>" required><br>
        <label>Harga:</label>
        <input type="number" name="harga" value="<?= $makanan['harga']; ?>" required><br>
        <label>Deskripsi:</label>
        <textarea name="desc" required><?= $makanan['desc']; ?></textarea><br>
        <label>Gambar (URL):</label>
        <input type="text" name="foto" value="<?= $makanan['foto']; ?>" required><br>
        <input type="submit" value="Simpan">
    </form>
</body>
</html>
