<?php

require 'function.php';

if (isset($_POST["register"]) ) {

    if (registrasi ($_POST) > 0) {
        echo "<script>
            alert('user baru berhasil ditambahkan')
            </script>";
    } else {
        echo mysqli_error ($conn);
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.scss">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>
<body>
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
         <h1 class="user__title">Daftar</h1>
    </header>

    
    <form action="" method="post" class="form">
    <div class="form_group">
            <input type="text" name="username" placeholder="Username" class="form__input" required>
    </div>
    <div class="form_group">
            <input type="password"  name="password" placeholder="password" class="form__input" required>
    </div>
    <div class="form_group">
            <input type="password"  name="password2" placeholder="konfirmasi password" class="form__input"required>
    </div>
   
    <div class="form_group">
            <button type="submit" name="register" class="btn1">Daftar</button>
    </div>

 </form>
 </div>
 <div class="text-center">
<p class="fst-italic">jika sudah punya akun klik di link bawah ini</p> <a href="login.php" class="link-primary">masuk</a>
</div>

 <script src="script.js"  type="text/javascript" ></script>
</body>
</html>