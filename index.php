<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("location:login.php");
    exit;
}


require "function.php";
$mydata = query ("SELECT * FROM tugas");
//jika tombol  cari di tekan
if (isset($_POST["cari"])){
    $mydata=cari($_POST["keyword"]);
}

$no=1;
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
<div class="logout" style="position:relative;left:1200px;top:40px;">
    <a href="logout.php" class="btn btn-danger">logout</a>
</div>
    <div class="card mt-3 ms-4 border-dark" style="max-width: 35rem">
    <h2 class="ms-4">Kumpulkan Tugas</h2>
    <form action="" method="post">
    <div class="row mb-3 mt-3 ms-3">
        <label for="username" class="col-sm-2 col-form-label">Nama </label>
            <div class="col-sm-10">
        <input type="text" class="form" id="username" size="30" name="nama" required>
            </div>
    </div>
    <div class="row mb-3 ms-3">
        <label for="URL" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
        <input type="text" class="form" id="URL" size="30" name="nim" required autocomplete="off">
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
        <select class="form-select mb-4 me-4 " id="inputGroupSelect04" name="kelas" required >
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
    <button type="submit" id="kumpulkan"  name="kirim" class="btn btn-secondary"> Kirim</button> 
    <button type="reset" id="refresh" class="btn btn-secondary"> Refresh</button>
    </div>


    </form>
    </div>
<br>
<br>
<div class="pencarian" style="position:relative;left:40px;">
<form action="" method="post">
<input type="text" size="40" name="keyword" class="form" placeholder="masukkan kata kunci" autofocus autocomplete="off">
<button type="submit" name="cari" style="background-color:black;color:white;">cari</button>
</form>
</div>


<br>
<br>
     <table class="table table-sm  mx-auto " style="max-width: 80rem">
    <thead class="table-dark">
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nim</th>
        <th>Kelas</th>
        <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mydata as $row) : ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row ["nama"]; ?></td>
            <td><?php echo $row ["nim"] ;?></td>
            <td><?php echo $row ["kelas"] ;?></td>
            <td>
            <a href="edit.php?id=<?php echo $row["id"];?>"><button type="button" class="btn btn-success" name="edit" >Edit</button></a>
            <a href="hapus.php?id=<?php echo $row ["id"]; ?>"><button type="button" class="btn btn-danger" name= "hapus" 
             onclick=" return confirm('yakin ingin menghapus data ini ?')">Hapus</button></a>
              
            </td>
        </tr>
        <?php  endforeach ;?>
    </tbody>
    </table>
<script>
    
</script>

</body>
</html>