<?php

@session_start();
require_once 'koneksi.php';
$username	= @$_POST['username'];
$password	= @$_POST['password'];
$login		= $_POST['login'];

if ($login) {


	if ($username == "" || $password == "") {
		echo "<script>alert('Username atau Password masih kosong');
		location.href=login.php';
		</script>";
	} else {
		$sql	=	mysqli_query($koneksi, "SELECT * FROM tb_user WHERE passwordd = '$password' AND (username = '$username' OR telp='$username')");
		$data	=	mysqli_fetch_array($sql);
		$cek	=	mysqli_num_rows($sql);

		$sql1	=mysqli_query($koneksi, "SELECT * FROM siswa WHERE password ='$password' AND (nis = '$username' OR nisn='$username' OR nomor_telp='$username')");
		$data1	=mysqli_fetch_array($sql1);
		$cek1	=mysqli_num_rows($sql1);

		if ($cek >= 1) {
			if ($data['type_user'] == "tata usaha") {
				@$_SESSION['tata usaha'] = $data['id_user'];
				header("location: index.php");
			} else if ($data['type_user'] == "admin") {
				@$_SESSION['admin'] = $data['id_user'];
				header("location: index.php");
			}
		} else {
			if($cek1 >= 1){
				@$_SESSION['siswa'] = $data1['nisn'];
				header("location: siswa/index.php");
			} else{
				echo "<script>alert('Username atau Password salah');
			location.href='login.php'
			</script>";
			}
		}
	}
}