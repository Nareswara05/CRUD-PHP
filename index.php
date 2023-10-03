<?php
include 'function.php';

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $makanan = searchMakanan($keyword);
} else {
    $makanan = getMakanan();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Makanan</title>
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

        table {
            width: 80%;
            margin: 0 auto;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        td {
            align-items: center;
            justify-content: center;
            width: 180px;
        }

        th, td {
            align-items: center;
            justify-content: center;
            padding: 12px 15px;
            text-align: left;
        }

        th {
            text-align: center;
            background-color: #3498db;
            color: #fff;
        }

        .tdImg {
            width: 180px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        

        img {
            width: 140px;
            max-width: 200px;
            height: 80px;
            object-fit : cover;
            display: block;
            margin: 0 auto;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: none;
        }

        

        .button:hover {
            background-color: #2980b9;
        }

        .btn-edit {
            background-color: #3498db;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit:hover {
    background-color: #2980b9;
}

        .btn-delete {
            background-color: #e74c3c;
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }
        .btn-delete:hover {
    background-color: #c0392b;
}

        input{
            padding-left : 10px;
            border-radius: 5px;
            width: 150%;
            height: 40px;
        }
        
        .action-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin: 0 auto;
            margin-top: 100px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            width: 70%;
        }

        .search-btn {
            height: 40px;
            margin-left : 10px;
            width: 20%; 
            background-color: #3498db;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        .search-btn:hover {
            background-color: #0069b0;
        }

        .add-btn {
            width: 5%;
            height: 40px;
            padding: 10px;
            text-align: center;
            background-color: #20cc00;
            color: #fff;
            border: none;
            border-radius: 10px;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-btn:hover {
            text-decoration: none;
            background-color: #19a500;
        }

        .action{
            padding-left : 37px ;
            align-items: center;
            width : 140px;
        }

        .no{
            width : 50px;
            text-align: center;
        }

        .price{
            width : 50px;
        }
       


    </style>
</head>
<body>
    <h1>Data Makanan</h1>
    <div class="action-bar">
        <form action="index.php" method="GET" class="search-bar">
            <input type="text" name="keyword" placeholder="Search here...">
            <button type="submit" class="search-btn">Search</button>
        </form>
        <a href="tambah.php" class="add-btn">+</a>
    </div>
    
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Makanan</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($makanan as $food) {
                ?>
                <tr>
                    <td class="no"><?= $no++; ?></td>
                    <td><?= $food['nama']; ?></td>
                    <td class="price">Rp<?= $food['harga']; ?></td>
                    <td><?= $food['desc']; ?></td>
                    <td class="tdImg"><img src="<?= $food['foto']; ?>" alt="<?= $food['nama']; ?>" width="100"></td>
                    <td class="action">
                        <a href="edit.php?id=<?= $food['id']; ?>" class="btn-edit">Edit</a>
                        <a href="hapus.php?id=<?= $food['id']; ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus data?')">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
