<?php
$id		= $_GET['id'];
$nisn 		= $_POST['nisn'];
$nis 	= $_POST['nis'];
$nama		= $_POST['nama'];
$jk			= $_POST['jk'];
$id_kelas	= $_POST['id_kelas'];
$alamat		= $_POST['alamat'];
$no_telp		= $_POST['no_telp'];
$id_tahun		= $_POST['id_tahun'];
$password		= $_POST['password'];

if($jk == null ){
	echo "
	<script>alert('Mohon pilih jenis kelamin!');
		location.href='?page=ubah_siswa&id=$id';
	</script>";
}
elseif($id_kelas == null ){
	echo "
	<script>alert('Mohon pilih kelas!');
		location.href='?page=ubah_siswa&id=$id';
	</script>";
}
elseif($id_tahun == null ){
	echo "
	<script>alert('Mohon pilih tahun ajaran!');
		location.href='?page=ubah_siswa&id=$id';
	</script>";
} else{
	$sql = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn', nis='$nis', nama='$nama', jk='$jk', id_kelas='$id_kelas', alamat='$alamat', nomor_telp='$no_telp', id_tahun='$id_tahun', password='$password' WHERE nisn='$id'");
	if ($sql) {
		echo "
		<script>alert('Data berhasil diubah');
			location.href='?page=siswa';
		</script>";
	} else {
		echo "
		<script>alert('Data gagal diubah');
			location.href='index.php?page=siswa';
		</script>";
	}
}