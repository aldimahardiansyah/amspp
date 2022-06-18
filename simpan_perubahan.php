<?php

	$id		= $_GET['id'];
	
	$akses = $_POST['type_user'];
	
		
	
	$query	= mysqli_query($koneksi, "UPDATE tb_user SET type_user = '$akses' WHERE id_user ='$id'");
	
	if($query) {
		echo "<script>
			alert('Data berhasil diubah');
				document.location='?page=user'</script>
				";
	}
	
	else {
		echo "<script>
				alert('Data gagal diubah');
				document.location='?page=user'</script>
				";
	}

?>