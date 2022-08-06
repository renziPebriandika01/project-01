<?php
session_start();
require 'function.php';


//cek cookie
if(isset($_COOKIE['qwerty']) && isset($_COOKIE['key'])) {
    $qwerty = $_COOKIE['qwerty'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result= mysqli_query($conn,"SELECT username FROM user
            WHERE id =$qwerty");
    $row = mysqli_fetch_assoc($result);
    //cek cooike and username   
    if($key===hash("sha256",$row["username"])){
        $_SESSION["login"]=true;
    }

}

if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}


if( isset($_POST["login"]) ){
    
    $username= $_POST["username"];
    $password= $_POST["password"];

    $result=mysqli_query($conn,"SELECT* FROM user WHERE username='$username'");

    //cek username
    if(mysqli_num_rows($result)===1){
        //cek password
        $row=mysqli_fetch_assoc($result);
       if(password_verify($password,$row["password"])){
        //set session
        $_SESSION["login"]= true;
        //jika ceklis remember di klik maka buat cookie
        if (isset($_POST["remember"])){
            setcookie("qwerty",$row["id"],time()+60);
            setcookie("key",hash("sha256",$row["username"]),time()+60);
        }
        header("location:index.php");
        exit;
       }
    }
    $error=true;
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.scss">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>

<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
         <h1 class="user__title">Login</h1>
    </header>

    <form action="" method="post" class="form">
        <?php if(isset($error)) : ?>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
         <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
             <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
         </symbol>
    </svg>

    <div class="alert alert-danger d-flex align-items-center" role="alert">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
    <div>
     username atau password salah
    </div>
    </div>

        <?php endif ?>
        
    <div class="form_group">
        <input type="text" name="username" placeholder="Username" class="form__input">
    </div>
    <div class="form_group">
         <input type="password"  name="password" placeholder="password" class="form__input">
    </div>
    <div class="form_group">
        <button type="submit" name="login" class="btn1">Login</button>
    </div>
    <div class="form-check">
  <input class="form-check-input" type="checkbox" name="remember" value="" id="flexCheckDefault" disable>
  <label class="form-check-label" for="flexCheckDefault">
    Remember Me
  </label>
</div>

    </form>
</div>
<div class="text-center">
<p class="fst-italic">belum punya akun? </p> <a href="registrasi.php" class="link-primary">Daftar disini</a>
</div>
<script src="script.js"  type="text/javascript" ></script>
</body>
</html>