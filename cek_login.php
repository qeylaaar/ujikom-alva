<?php
//mengaktifkan session pada php 
session_start();

//php ke db ( koneksi )
include 'koneksi.php';

//menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);


//menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from petugas where username='$username' and password='$password'");
//menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

//cek apakah username dan password di temukan pada database
if($cek > 0){

    $data = mysqli_fetch_assoc($login);

    //cek jika user login sebagai admin
    if($data['level']=="admin"){

        //buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = "admin";
        //alihkan ke halaman dashboard admin
        header("location:administrator/beranda.php");
    }else if($data['level']=="petugas"){

        //buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['level'] = "petugas";
        //alihkan ke halaman dashboard petugas
        header("location:petugas/beranda.php");
    }else{
            //alihkan ke halaman login kembali
            header("location:login.php?info=gagal");
    }
}
?>