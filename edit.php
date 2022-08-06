<?php
session_start();
if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
}

require 'function.php';
$id=$_GET["id"];
//ambil data dari tugas
$mhs=query("SELECT * FROM tugas WHERE id=$id")[0];
if( isset($_POST["ubah"]) ){
    if(edit($_POST)> 0) {
        echo "<script>
        alert('data berhasil diubah');
        document.location.href='index.php';
    </script>";
    } else {
       echo " <script>
        alert('data gagal diubah');
        document.location.href='index.php';
    </script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumpulan Tugas</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">


</head>
<body style="height:1000px">
    <div class="card mt-3 ms-4 border-dark" style="max-width: 35rem">
    <h2 class="ms-4">Kumpulkan Tugas</h2>     
    <form action="" method="post">
    <input type="hidden" name="id" value="<?php echo $mhs["id"];?>">
    <div class="row mb-3 mt-3 ms-3">
        <label for="username" class="col-sm-2 col-form-label">Nama </label>
            <div class="col-sm-10">
        <input type="text" class="form" id="username" size="30" name="nama" required value="<?php echo $mhs["nama"];?>">
            </div>
    </div>

    <div class="row mb-3 ms-3">
        <label for="URL" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
        <input type="text" class="form" id="URL" size="30" name="nim" require value="<?php echo $mhs["nim"];?>" >
            </div>
    </div>
    <div class="row mb-3 ms-3">
        <label for="URL" class="col-sm-2 col-form-label">URL</label>
            <div class="col-sm-10">
        <input type="text" class="form" id="URL" size="30" placeholder="exp :http://drive.google.com " name="url" required>
            </div>
    </div>
    <div class="input-group form-select-sm-1 ">
    <label class="col-sm-2 col-form-label ms-4 ">Kelas</label>
        <select class="form-select mb-4 me-4 " id="inputGroupSelect04" name="kelas" required value="<?php echo $mhs["kelas"];?>">
        <option selected>Pilih Kelas</option>
        <option value="IF-1">IF-1</option>
        <option value="IF-2">IF-2</option>
        <option value="IF-3">IF-3</option>
        <option value="IF-4">IF-4</option>
        <option value="IF-5">IF-5</option>
        <option value="IF-6">IF-6</option>
        <option value="IF-7">IF-7</option>
        <option value="IF-8">IF-8</option>
        <option value="IF-9">IF-9</option>

         </select>
    </div>
    <div class="ms-4 mb-4">
    <button type="submit" id="kumpulkan"  name="ubah" class="btn btn-secondary"> Kirim</button> 
    <button type="reset" id="refresh" class="btn btn-secondary"> Refresh</button>
    </div>
 </body>
</html>