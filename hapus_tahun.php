<?php

$id		= $_GET['id'];

$query	= mysqli_query($koneksi, "DELETE FROM tahun_ajaran WHERE id_tahun = '$id'");

if ($query) {
	echo "<script>
			alert('Data berhasil dihapus');
				document.location='?page=tahun_ajaran'</script>
				";
} else {
	echo "<script>
				alert('Data gagal dihapus');
				document.location='?page=tahun_ajaran'</script>
				";
}