<?php
$id		= $_GET['id'];
$nama		= $_POST['nama'];
$email	= $_POST['email'];
$telp	= $_POST['telp'];
$username		= $_POST['username'];
$password		= $_POST['password'];
$type_user		= $_POST['type_user'];
$foto 			= $_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/user/'.$foto);
$sql = mysqli_query($koneksi, "UPDATE tb_user SET nama='$nama', email='$email', telp='$telp', username='$username', passwordd='$password', type_user='$type_user', status_akun='use', foto='$foto' WHERE id_user='$id'");
if ($sql) {
	echo "
	<script>alert('Data berhasil diubah');
		location.href='?page=user';
	</script>";
} else {
	echo "
	<script>alert('Data gagal diubah');
		location.href='index.php?page=ubah_user&id=$id';
	</script>";
}