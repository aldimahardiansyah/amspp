<?php
$id_kelas 		= $_POST['id_kelas'];
$nama_kelas 	= $_POST['nama_kelas'];

$sql = mysqli_query($koneksi, "INSERT INTO kelas(id_kelas, nama_kelas) VALUES ('$id_kelas', '$nama_kelas')");
if ($sql) {
	echo "
	<script>alert('Data berhasil ditambah');
		location.href='?page=kelas';
	</script>";
} else {
	echo "
	<script>alert('Data gagal ditambah');
		location.href='index.php?page=kelas';
	</script>";
}