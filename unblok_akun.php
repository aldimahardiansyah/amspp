<?php

	$id		= $_GET['id'];
	
	
		
	
	$query	= mysqli_query($koneksi, "UPDATE tb_user SET status_akun = 'use'  WHERE id_user ='$id'");
	
	if($query) {
		echo "<script>
			alert('Data berhasil diubah');
				document.location='?page=akun_yang_diblok'</script>
				";
	}
	
	else {
		echo "<script>
				alert('Data gagal diubah');
				document.location='?page=akun_yang_diblok'</script>
				";
	}

?>