<?php
$id		= $_GET['id'];
$id_tahun = $_POST['id_tahun'];
$tahun_ajaran 		= $_POST['tahun_ajaran'];
$status			= $_POST['status'];

$sql = mysqli_query($koneksi, "UPDATE tahun_ajaran SET id_tahun='$id_tahun', tahun_ajaran='$tahun_ajaran', status='$status' WHERE id_tahun='$id'");
if ($sql) {
	echo "
	<script>alert('Data berhasil diubah');
		location.href='?page=tahun_ajaran';
	</script>";
} else {
	echo "
	<script>alert('Data gagal diubah');
		location.href='?page=ubah_tahun';
	</script>";
}