<?php
//koneksi database
$server = "localhost";
$username= "root";
$password = "";
$db = "dbtugas";

$conn = mysqli_connect ($server,$username,$password,$db); 

$result= mysqli_query($conn,"SELECT * from user");
//menampilkan database
function query($query){
    global $conn;
    $result=mysqli_query($conn,$query);
    $data=[];
    while ($isidata = mysqli_fetch_assoc($result)){
        $data []=$isidata;
    }
    return $data;
}

//function tambah data
function add($add) {
    global $conn;
        $nama= htmlspecialchars($add["nama"]);
        $nim= htmlspecialchars ($add["nim"]);
        $kelas= $add["kelas"];
        $url=htmlspecialchars ($add["url"]);
    
    $insert="INSERT INTO tugas VALUES
            ('','$nim','$nama','$url','$kelas')";
    mysqli_query($conn,$insert);

    return mysqli_affected_rows($conn);
}
if( isset($_POST["kirim"]) ){
    if(add($_POST)> 0) {
        echo "<script>
        alert('data berhasil ditambahkan');
        document.location.href='index.php';
    </script>";
    } else {
       echo " <script>
        alert('data gagal ditambahkan');
        document.location.href='index.php';
    </script>";
    }
}
function hapus($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM tugas where id = '$id' ");
    return mysqli_affected_rows($conn);
   
    
}
function edit($edit) {
    global $conn;
        $id=$edit["id"];
        $nama= htmlspecialchars($edit["nama"]);
        $nim= htmlspecialchars ($edit["nim"]);
        $kelas= $edit["kelas"];
        $url=htmlspecialchars ($edit["url"]);
    
    $insert="UPDATE tugas SET 
                nama='$nama',
                nim ='$nim',
                kelas='$kelas',
                url ='$url'
            WHERE id=$id
            ";

    mysqli_query($conn,$insert);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query= "SELECT * FROM tugas 
                WHERE 
                nama LIKE  '%$keyword%' OR
                kelas LIKE '%$keyword%'  OR
                nim LIKE '%$keyword%' ";
return query($query);
}

function registrasi( $data ) {
    global $conn ;
    global $result;
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    //cek username udh ada atau belum
mysqli_query($conn,"SELECT username FROM user WHERE 
                username='$username'");
if (  $result->fetch_assoc()){
    echo "<script>
            alert('username sudah terdaftar');
        </script>";
        return false;
}

//cek konfirmasi password
if( $password !== $password2 ){
    echo "<script>
    alert('password tidak sesuai');
    </script>";
    return false;

} 
//enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);
//tambahkan userbaru ke database
 mysqli_query( $conn, "INSERT INTO user VALUES ('','$username','$password')");
 return mysqli_affected_rows($conn);
    
}



?>