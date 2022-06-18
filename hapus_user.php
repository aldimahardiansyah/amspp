<?php

$id		= $_GET['id'];

$query	= mysqli_query($koneksi, "DELETE FROM tb_user WHERE id_user = '$id'");

if ($query) {
	echo "<script>
			alert('Data berhasil dihapus');
				document.location='?page=user'</script>
				";
} else {
	echo "<script>
				alert('Data gagal dihapus');
				document.location='?page=user'</script>
				";
}