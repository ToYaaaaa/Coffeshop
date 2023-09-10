<?php
session_start();

//cek cookie
if( isset($_COOKIE['login'])){
    if($_COOKIE['login'] == "true"){
        $_SESSION["login"] = true;
    }
}


require 'function.php';
// cek apakah button di klik atau tidak 
if(isset($_POST['submit'])){
$username = $_POST['username'];
$password = $_POST['password'];

//ambil data username dari database
$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

// cek username
if(mysqli_num_rows($result) === 1){

    // cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {

        // cek session
        $_SESSION["login"] = true;
        
        // cek  remember me
    if(isset($_POST["remember"])){
        //set cookie
            setcookie('login', 'true', time() + 60 );
    }


        header("Location: product.php");
        exit;
    }
}
$error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="../css/login.css" />
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
<?php if(isset($error)) : ?>
<p style="color='red'">password/username salah bro</p>
    <?php endif; ?>
    <div class="container">
        <form action="" method="post" class="form">
            <label for="username">Username : </label>
            <input type="text" name="username" id="username" placeholder="Username" autocomplete="off"><br>

            <label for="password">Password : </label>
            <input type="password" name="password" id="password" placeholder="password" autocomplete="off">

            <input type="checkbox" name="remember" id="remember">
            <label for="remember" id="label-remember">Remember me </label>

        <button type="submit" name="submit" class="button">Login!!!</button>
        </form>
        <p class="text">belum punya akun?Daftar <a href="register.php">Disini</a>.</p>
    </div>
</body>
</html>