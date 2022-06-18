<?php
$nomor_telp		= $_POST['nomor_telp'];
$password_lama 	= $_POST['password_lama'];
$password 		= $login->password;

if(isset($_POST['batal'])){
	echo "<script>
		location.href='?page=pengaturan';
	</script>";
} else{

if($password_lama==$password){
	$query	= "UPDATE siswa SET nomor_telp='$nomor_telp' WHERE nisn='$login->nisn' ";
	$sql	= mysqli_query($koneksi, $query);
	if($sql){
		echo "
			<script>alert('Nomor telepon berhasil diubah');
				location.href='?page=pengaturan';
			</script>";
	} else{
		echo "
			<script>alert('Nomor telepon gagal diubah');
				location.href='?page=pengaturan';
			</script>";
	}
} else{
	echo "
			<script>alert('Password yang anda masukkan salah!');
				location.href='?page=pengaturan';
			</script>";
}
}
?>