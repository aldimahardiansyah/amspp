	    <link rel="stylesheet" href="assets/css/section.css">
	    <link rel="stylesheet" href="assets/css/about.css">

<div style="background-color: #eaeaea; margin-bottom: 10px;  color: #929292;">
	<nav class="navbar navbar-default">
			<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">AM-SPP</a>
				</div> <!-- /.navbar-header -->

		    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">HOME</a></li>
						<li><a href="?page=tagihan&id=<?php echo $login->nisn?>&st=<?php while($data1=mysqli_fetch_object($sql1)){
						 echo $data1->tahun_ajaran;
						}?>">TAGIHAN</a></li>
						<li class="active"><a href="?page=pengaturan">PENGATURAN AKUN</a></li>
						<li><a href="../logout.php" style="background-color: #dd0000; font-weight: bold; border-radius: 6px; margin-left: 50px; margin-right: 0px; color: #fff;">LOGOUT</a></li>
					</ul> <!-- /.nav -->
			    </div><!-- /.navbar-collapse -->
	</nav>
</div>

<section class="content content-awal">
	<div class="box-body">
            <form method="post" class="form-horizontal" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <p>
                            <input style="border: 0px; background-color: transparent;" value="<?php echo $login->nama ?>" type="text" name="nama"
                                class="form-control" disabled>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nis" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-4">
                        <p>
                            <input style="border: 0px; background-color: transparent;" value="<?php echo $login->nis ?>" type="text" name="nis"
                                class="form-control" disabled>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="kelas" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-4">
                        <p>
                            <input style="border: 0px; background-color: transparent;" value="<?php
                            $sqlk =mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$userlogin' OR nis='$userlogin'");
                            $datak =mysqli_fetch_object($sqlk);
                             echo $datak->nama_kelas; ?>" type="text" name="kelas"
                                class="form-control" disabled>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nomor_telp" class="col-sm-2 control-label">No. Telepon</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $login->nomor_telp ?>" type="text" name="nomor_telp"
                                class="form-control" disabled>
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $login->password ?>" type="password" name="password"
                                class="form-control" disabled>
                        </p>
                    </div>
                </div>
        <div style="margin-left: 40px; margin-top: 40px;">
            <button type="submit" name="submit" class="btn btn-primary">Ubah Password</button>
            <button type="submit" name="batal" class="btn btn-primary">Ubah No. Telepon</button>
        </div>

        </div>
        
        </form>
</section>

<?php if(isset($_POST['submit'])){ ?>
<section class="content content-awal">
	<h4>UBAH PASSWORD</h4>
	<form action="?page=f_ubah_password" method="post" class="form-horizontal" style="margin: 20px;">

		<div class="form-group">
                    <label style="text-align: left;" for="password" class="col-sm-2 control-label">Password Baru</label>
                    <div class="col-sm-4">
                        <p>
                            <input type="password" name="password_baru" placeholder="Contoh : !nd.0nes14_" 
                                class="form-control">
                        </p>
                    </div>
        </div>

        <div class="form-group">
                    <label style="text-align: left;" for="password" class="col-sm-2 control-label">Password Saat Ini</label>
                    <div class="col-sm-4">
                        <p>
                            <input type="password" name="password_lama" 
                                class="form-control">
                        </p>
                    </div>
        </div>

        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
        <button class="btn btn-danger" name="batal" href="?page=pengaturan">BATAL</button>
	</form>
</section>
<?php 
}

if(isset($_POST['batal'])){ ?>
<section class="content content-awal">
	<h4>UBAH NOMOR TELEPON</h4>
	<form action="?page=f_ubah_telepon" method="post" class="form-horizontal" style="margin: 20px;">

		<div class="form-group">
                    <label style="text-align: left;" for="nomor_telp" class="col-sm-2 control-label">Masukkan Nomor Baru</label>
                    <div class="col-sm-4">
                        <p>
                            <input type="number" name="nomor_telp" placeholder="Contoh : 08123456789" 
                                class="form-control">
                        </p>
                    </div>
        </div>

        <div class="form-group">
                    <label style="text-align: left;" for="password" class="col-sm-2 control-label">Masukkan Password</label>
                    <div class="col-sm-4">
                        <p>
                            <input type="password" name="password_lama" 
                                class="form-control">
                        </p>
                    </div>
        </div>

        <input type="submit" name="simpan" value="SIMPAN" class="btn btn-primary">
        <button class="btn btn-danger" name="batal" href="?page=pengaturan">BATAL</button>
	</form>
</section>
<?php }?>