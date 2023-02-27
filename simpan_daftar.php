<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$nik = $_POST['nik'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$telp = $_POST['telp'];

// menginput data ke database
mysqli_query($koneksi,"insert into masyarakat values('$nik','$nama','$username','$password','$telp')");
// mengalihkan halaman kembali ke index.php
header("location:log.php");

?>