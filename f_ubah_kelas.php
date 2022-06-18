<?php
$id		= $_GET['id'];
$id_kelas = $_POST['id_kelas'];
$nama_kelas 		= $_POST['nama_kelas'];

$sql = mysqli_query($koneksi, "UPDATE kelas SET id_kelas='$id_kelas', nama_kelas='$nama_kelas' WHERE id_kelas='$id'");
if ($sql) {
	echo "
	<script>alert('Data berhasil diubah');
		location.href='?page=kelas';
	</script>";
} else {
	echo "
	<script>alert('Data gagal diubah');
		location.href='index.php?page=kelas';
	</script>";
}