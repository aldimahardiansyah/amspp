<?php
$password_baru	= $_POST['password_baru'];
$password_lama 	= $_POST['password_lama'];
$password 		= $login->password;

if(isset($_POST['batal'])){
	echo "<script>
		location.href='?page=pengaturan';
	</script>";
} else{

if($password_lama==$password){
	$query	= "UPDATE siswa SET password='$password_baru' WHERE nisn='$login->nisn' ";
	$sql	= mysqli_query($koneksi, $query);
	if($sql){
		echo "
			<script>alert('Password berhasil diubah');
				location.href='?page=pengaturan';
			</script>";
	} else{
		echo "
			<script>alert('Password gagal diubah');
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