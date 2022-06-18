<?php

$id		= $_GET['id'];

$query	= mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = '$id'");

if ($query) {
	echo "<script>
			alert('Data berhasil dihapus');
				document.location='?page=kelas'</script>
				";
} else {
	echo "<script>
				alert('Data gagal dihapus');
				document.location='?page=kelas'</script>
				";
}