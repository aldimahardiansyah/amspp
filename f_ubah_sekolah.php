<?php
$id				= $_GET['id'];
$nama_sekolah	= $_POST['nama_sekolah'];
$nama_kepsek	= $_POST['nama_kepsek'];
$alamat_sekolah	= $_POST['alamat_sekolah'];
$jumlah_guru	= $_POST['jumlah_guru'];
$jumlah_jurusan	= $_POST['jumlah_jurusan'];
$jumlah_ekskul	= $_POST['jumlah_ekskul'];
$jumlah_partner_instansi	= $_POST['jumlah_partner_instansi'];
$foto 			= $_FILES['logo_sekolah']['name'];

move_uploaded_file($_FILES['logo_sekolah']['tmp_name'], 'assets/img/sekolah/'.$foto);
$sql = mysqli_query($koneksi, "UPDATE sekolah SET nama_sekolah='$nama_sekolah', nama_kepsek='$nama_kepsek', alamat_sekolah='$alamat_sekolah', logo_sekolah='$foto', jumlah_guru='$jumlah_guru', jumlah_jurusan='$jumlah_jurusan', jumlah_ekskul='$jumlah_ekskul', jumlah_partner_instansi='$jumlah_partner_instansi' WHERE id_sekolah='$id'");
if ($sql) {
	echo "
	<script>alert('Pengaturan berhasil disimpan!');
		location.href='?page=pengaturan_sekolah';
	</script>";
} else {
	echo "
	<script>alert('Pengaturan gagal disimpan!');
		location.href='index.php?page=pengaturan_sekolah';
	</script>";
}