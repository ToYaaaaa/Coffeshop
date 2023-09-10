<?php
session_start();
// menghubungkan antar file
require 'function.php';

$pelanggan = query("SELECT * FROM kopi");

//cek sudah login atau belum
if(!isset($_SESSION['login'])){
    header('location: login.php');
    exit;
}

// bar cari
// cek button sudah diklik atau blm 
if( isset($_POST['search'])){
    $pelanggan = cari($_POST['search']);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../css/product.css">
    <!-- icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <!-- favicon -->
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <!-- title -->
    <title>CoffeShop</title>
</head>
<body>
    <div class="container">

    <h1>Daftar Kopi</h1>

    <a href="../index.html" class="kembali"><i data-feather="arrow-left" id="kembali"></i></a>
    <a href="destroy.php" class="logout"><i data-feather="log-out" id="logout"></i></a>

    <form action="" method="post" class="form-cari">
        <input type="text" name="search" placeholder="cari data disini" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari!!</button>
    </form>

    <table border='1' cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Product</th>
            <th>Nama Kopi</th>
            <th>Pesan</th>
        </tr>
<?php $i = 1;?>
<?php foreach ($pelanggan as $row) :?>
        <tr>
            <td><?php echo$row['id'];?></td>
            <td><img src="../img/<?php echo $row['image'];?>" alt="" style="width:50px"></td>
            <td><?php echo $row['name'];?></td>
            <td><a href="#"> + </a></td>
        </tr>
<?php $i++?>
<?php endforeach;?>
    </table>
</div>
<!-- icon -->
<script>feather.replace();</script>
</body>
</html>