<?php
session_start();
require 'koneksi.php';

if(isset($_POST['login'])){

    $user = trim($_POST['username']);
    $pass = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM user WHERE username='$user' LIMIT 1");

    if(mysqli_num_rows($query) == 0){
        echo "User tidak ditemukan!";
        exit;
    }

    $data = mysqli_fetch_assoc($query);

    // cek password (MD5 + plain)
    if($pass == $data['password'] || md5($pass) == $data['password']){

        $_SESSION['id_user'] = $data['id_user'];
        $_SESSION['nama'] = $data['nama'];
        $_SESSION['level'] = $data['level'];

        if($data['level'] == 'admin'){
            header("Location: dashboard_admin.php");
            exit;
        }
        else if($data['level'] == 'kasir'){
            header("Location: dashboard_kasir.php");
            exit;
        }
        else {
            echo "Level tidak dikenali!";
        }

    } else {
        echo "Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Toko Sembako</title>

    <style>
        body{
            font-family: Arial;
            background:#f2f2f2;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .box{
            background:white;
            padding:20px;
            width:300px;
            border:1px solid #ccc;
            text-align:center;
        }

        input{
            width:90%;
            padding:8px;
            margin:5px 0;
        }

        button{
            padding:8px 15px;
            width:95%;
            background:#2d89ef;
            color:white;
            border:none;
            cursor:pointer;
        }

        button:hover{
            background:#1b5fbf;
        }

        h2{
            margin-bottom:5px;
        }

        p{
            font-size:12px;
            color:gray;
        }
    </style>
</head>

<body>

<div class="box">

    <h1>LOGIN</h1>
    <h2>sembify</h2>

    <form method="POST">
        <input name="username" placeholder="Username"><br>
        <input name="password" type="password" placeholder="Password"><br><br>

        <button name="login">Masuk</button>
    </form>

</div>

</body>
</html>
