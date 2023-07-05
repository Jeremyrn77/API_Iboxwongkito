<?php
require("koneksi.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama = $_POST["nama"];
    $lokasi = $_POST["lokasi"];
    $urlmap = $_POST["urlmap"];
    
    $perintah = "INSERT INTO tbl_iboxwongkito (nama, lokasi, urlmap) VALUES('$nama','$lokasi','$urlmap')";
    $eksekusi = mysqli_query($konek, $perintah);
    $cek = mysqli_affected_rows($konek);
    
    if($cek>0){
        $response["kode"] = 1;
        $response["pesan"] = "Tambah Data Berhasil";
    }
    else{
        $response["kode"] = 0;
        $response["pesan"] = "Tambah Data Gagal" ;
    }
}
else{
    $response["kode"] = 0;
    $response["pesan"] = "Tidak ada Post Data";
}
echo json_encode($response);
mysqli_close($konek);