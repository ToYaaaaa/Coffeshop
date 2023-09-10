<?php
require "function.php";

// cek apakah button di klik atau tidak 
if(isset($_POST['submit'])){
    if(registrasi($_POST) > 0 ){
        echo "<script>
        alert('berhasil')
        document.location.href = 'login.php';
        </script>";
    }else{
        echo "<script>
        alert('gagal')
        document.location.href = 'register.php';
        </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../css/registrasi.css" />
    <!-- icon -->
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,700;1,400;1,700&display=swap"
    rel="stylesheet"
    />
    <title>Login</title>
</head>
<body>


    <div class="container">
        <form action="" method="post" class="form">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" placeholder="username" autocomplete="off">
            <label for="password">password : </label>
            <input type="password" name="password" id="password" placeholder="password" autocomplete="off">
            <label for="password2">konfir password : </label>
            <input type="password" name="password2" id="password2" placeholder="password2" autocomplete="off">
        <button type="submit" name="submit" class="button">Login!!!</button>
        </form>
        <p class="text">sudah punya akun?Login <a href="login.php">Disini</a>.</p>
    </div>
</body>
</html>