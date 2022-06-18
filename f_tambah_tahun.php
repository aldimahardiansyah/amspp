<?php
$id_tahun 		= $_POST['id_tahun'];
$tahun_ajaran 	= $_POST['tahun_ajaran'];
$status     	= $_POST['status'];

$sql = mysqli_query($koneksi, "INSERT INTO tahun_ajaran(id_tahun, tahun_ajaran, status) VALUES ('$id_tahun', '$tahun_ajaran', '$status')");
if ($sql) {
	echo "
	<script>alert('Data berhasil ditambah');
		location.href='?page=tahun_ajaran';
	</script>";
} else {
	echo "
	<script>alert('Data gagal ditambah');
		location.href='index.php?page=tambah_tahun';
	</script>";
}