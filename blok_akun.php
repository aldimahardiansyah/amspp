<?php

	$id		= $_GET['id'];
	
	
		
	
	$query	= mysqli_query($koneksi, "UPDATE tb_user SET status_akun = 'blok'  WHERE id_user ='$id'");
	
	if($query) {
		echo "<script>
			alert('Akun berhasil diblokir');
				document.location='?page=user'</script>
				";
	}
	
	else {
		echo "<script>
				alert('Akun gagal diblokir');
				document.location='?page=user'</script>
				";
	}

?>