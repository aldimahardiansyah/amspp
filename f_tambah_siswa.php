<?php
$nisn 		= $_POST['nisn'];
$nis 	= $_POST['nis'];
$nama		= $_POST['nama'];
$jk	= $_POST['jk'];
$id_kelas	= $_POST['id_kelas'];
$alamat		= $_POST['alamat'];
$no_telp		= $_POST['no_telp'];
$id_tahun		= $_POST['id_tahun'];

$thn2 = $id_tahun + 1;
$thn3 = $id_tahun + 2;
$kata	= str_shuffle(1234567890);
$password	=substr($kata, 0, 4);

$sql = mysqli_query($koneksi, "INSERT INTO siswa(nisn, nis, nama, jk, id_kelas, alamat, nomor_telp, id_tahun, password) VALUES ('$nisn', '$nis', '$nama', '$jk', '$id_kelas', '$alamat', '$no_telp', '$id_tahun', '$password')");
if ($sql) {

	$sql1 = mysqli_query($koneksi, "INSERT INTO tagihan_spp(nisn, nama_bulan, id_jebar, status, tgl_bayar, id_tahun) VALUES  
	('$nisn', 'Juli', '1', '2', '0','$id_tahun'), ('$nisn', 'Agustus', '1', '2', '0','$id_tahun'), ('$nisn', 'September', '1', '2', '0','$id_tahun'), 
	('$nisn', 'Oktober', '1', '2', '0','$id_tahun'), ('$nisn', 'November', '1', '2', '0','$id_tahun'), ('$nisn', 'Desember', '1', '2', '0','$id_tahun'), 
	('$nisn', 'Januari', '1', '2', '0','$id_tahun'), ('$nisn', 'Februari', '1', '2', '0','$id_tahun'), ('$nisn', 'Maret', '1', '2', '0','$id_tahun'), 
	('$nisn', 'April', '1', '2', '0','$id_tahun'), ('$nisn', 'Mei', '1', '2', '0','$id_tahun'), ('$nisn', 'Juni', '1', '2', '0','$id_tahun'),
	-- Tahun ke-2 
	('$nisn', 'Juli', '1', '2', '0','$thn2'), ('$nisn', 'Agustus', '1', '2', '0','$thn2'), ('$nisn', 'September', '1', '2', '0','$thn2'), 
	('$nisn', 'Oktober', '1', '2', '0','$thn2'), ('$nisn', 'November', '1', '2', '0','$thn2'), ('$nisn', 'Desember', '1', '2', '0','$thn2'), 
	('$nisn', 'Januari', '1', '2', '0','$thn2'), ('$nisn', 'Februari', '1', '2', '0','$thn2'), ('$nisn', 'Maret', '1', '2', '0','$thn2'), 
	('$nisn', 'April', '1', '2', '0','$thn2'), ('$nisn', 'Mei', '1', '2', '0','$thn2'), ('$nisn', 'Juni', '1', '2', '0','$thn2'),
	-- Tahun ke-3
		('$nisn', 'Juli', '1', '2', '0','$thn3'), ('$nisn', 'Agustus', '1', '2', '0','$thn3'), ('$nisn', 'September', '1', '2', '0','$thn3'), 
	('$nisn', 'Oktober', '1', '2', '0','$thn3'), ('$nisn', 'November', '1', '2', '0','$thn3'), ('$nisn', 'Desember', '1', '2', '0','$thn3'), 
	('$nisn', 'Januari', '1', '2', '0','$thn3'), ('$nisn', 'Februari', '1', '2', '0','$thn3'), ('$nisn', 'Maret', '1', '2', '0','$thn3'), 
	('$nisn', 'April', '1', '2', '0','$thn3'), ('$nisn', 'Mei', '1', '2', '0','$thn3'), ('$nisn', 'Juni', '1', '2', '0','$thn3')
	");
	echo "
	<script>alert('Data berhasil ditambah');
		location.href='?page=siswa';
	</script>";
} else {
	echo "
	<script>alert('Data gagal ditambah');
		location.href='index.php?page=siswa';
	</script>";
} 