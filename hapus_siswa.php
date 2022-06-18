<?php

$id		= $_GET['id'];

$query2 = mysqli_query($koneksi, "DELETE FROM tagihan_spp WHERE nisn='$id' ");
$query	= mysqli_query($koneksi, "DELETE FROM siswa WHERE nisn = '$id'");

if ($query && $query2) {
	echo "<script>
			alert('Data berhasil dihapus');
				document.location='?page=siswa'</script>
				";
} else {
	echo "<script>
				alert('Data gagal dihapus');
				document.location='?page=siswa'</script>
				";
}