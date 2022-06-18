<?php
	$nama		 = $_POST['nama'];
	$email	=	$_POST['email'];
	$telp	=	$_POST['telp'];
	$status_akun		 = "use";
	$username	=	$_POST['username'];
	$password	=	$_POST['password'];
	$type_user		 = $_POST['type_user'];
	$foto = $_FILES['gambar']['name'];
	
	
	
	move_uploaded_file($_FILES['gambar']['tmp_name'], 'assets/img/user/'.$foto);	
	$sql	= mysqli_query ($koneksi, 'INSERT INTO tb_user (nama, email, telp, status_akun, username, passwordd, type_user, foto) 
	VALUES("'.$nama.'", "'.$email.'", "'.$telp.'", "'.$status_akun.'", "'.$username.'", "'.$password.'", "'.$type_user.'", "'.$foto.'")');
	
	if($sql) {
		echo "<script>
			alert('Data berhasil ditambah');
				document.location='?page=user'</script>
				";
	}
	
	else {
		echo "<script>
				alert('Data gagal ditambah');
				document.location='?page=tambah_user'</script>
				";	}
?>