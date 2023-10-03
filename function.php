<?php
include 'koneksi.php';

function tambahMakanan($nama, $harga, $desc, $foto) {
    global $koneksi;
    $query = "INSERT INTO makanan (nama, harga, `desc`, foto) VALUES ('$nama', '$harga', '$desc', '$foto')";
    
    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        return false;
    }
}

function editMakanan($id, $nama, $harga, $desc, $foto) {
    global $koneksi;
    $query = "UPDATE makanan SET nama='$nama', harga='$harga', `desc`='$desc', foto='$foto' WHERE id=$id";
    
    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        return false;
    }
}

function hapusMakanan($id) {
    global $koneksi;
    $query = "DELETE FROM makanan WHERE id=$id";
    
    if (mysqli_query($koneksi, $query)) {
        return true;
    } else {
        return false;
    }
}

function getMakanan() {
    global $koneksi;
    $query = "SELECT * FROM makanan";
    $result = mysqli_query($koneksi, $query);
    $makanan = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $makanan[] = $row;
    }

    return $makanan;
}


function searchMakanan($keyword) {
    global $koneksi;
    $query = "SELECT * FROM makanan WHERE nama LIKE ?";
    
    
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, 's', $param);
    $param = '%' . $keyword . '%';
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    
    $makanan = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $makanan[] = $row;
    }

    return $makanan;
}


?>
