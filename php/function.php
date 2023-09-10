<?php
// connect database
$db = mysqli_connect("localhost", "root", "", "coffeshop");

// tampilkan data
function query($query){
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return  $rows;
}

//registrasi
function registrasi($tambah){
    global $db;

    $username = strtolower(stripslashes($tambah['username']));
    $password = $tambah['password'];
    $password2 = $tambah['password2'];

    //cek username sudah ada apa blm 
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo "<script>
        alert('username sudah pernah ada');
        </script>";
        return false;
    }

    //cek password
    if( $password !== $password2){
        echo "<script>
        alert('password salah');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
    //tambah username ke database
    $query = "INSERT INTO users VALUES ('', '$username', '$password')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// bar cari
function cari($query){
    $hasilCari = "SELECT * FROM kopi WHERE 
                    image LIKE '%$query%' OR
                    name LIKE '%$query%' ";
                    return query($hasilCari);
}
?>