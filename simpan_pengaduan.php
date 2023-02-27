<?php 
// koneksi database
include 'koneksi.php';

// menangkap data yang di kirim dari form
$isi_laporan = $_POST['isi_laporan'];
$nik = $_POST['nik'];
$tgl_pengaduan = date('Y-m-d');

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
	header("location:pengaduan.php?pesan=ekstensi");
}else{
	if($ukuran < 1044070){		
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'upload/'.$rand.'_'.$filename);
		mysqli_query($koneksi, "insert into pengaduan values('','$tgl_pengaduan','$nik','$isi_laporan','$xx','0')");
		header("location:pengaduan.php");
	}else{
		header("location:pengaduan.php?pesan=gagal");
	}
}
?>