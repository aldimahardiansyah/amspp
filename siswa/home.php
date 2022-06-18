<!-- Home -->
	<section class="header" id="header">
		
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
					<a class="navbar-brand" href="index-multipage.html">AM-SPP</a>
				</div> <!-- /.navbar-header -->

		    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a href="index.php">home</a></li>
						<li><a href="?page=tagihan&id=<?php echo $login->nisn?>&st=<?php while($data1=mysqli_fetch_object($sql1)){
						 echo $data1->tahun_ajaran;
						}?>">tagihan</a></li>
						<li><a href="?page=pengaturan">pengaturan akun</a></li>
						<li><a href="../logout.php" style="background-color: #dd0000; font-weight: bold; border-radius: 6px; margin-left: 50px; margin-right: 0px;">logout</a></li>
					</ul> <!-- /.nav -->
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container -->
		</nav>
		<div class="container">
			<div class="header-table">
				<div class="header-wrapper">
					<h1 class="header-title">
						<?php
						 echo $datas->nama_sekolah;?>
					</h1>
					<p class="header-subtitle">
						<?php while($data1=mysqli_fetch_object($sql1)){
						 echo $data1->tahun_ajaran;
						}?>
					</p>
				</div> <!-- /.header-wrapper -->
			</div>
		</div> <!-- /.container -->
	</section> <!-- /#header -->


<!-- Fan Facts -->
	<section class="fun">
		<div class="container section-wrapper">
		<h2 class="section-title black">
				Facts
			</h2> <!-- /.section-title -->
			<div class="underline purple"></div>	
			<div class="row">
				<div class="col-sm-3 col-xs-6">
					<div class="fun-box">
						<div class="number">
							<?php echo $datas->jumlah_ekskul;?>
						</div>
						<div class="number-title">
							ekstrakulikuler
						</div>
					</div> <!-- /.fun-box -->
				</div> <!-- /.col-md-3 -->
				<div class="col-sm-3 col-xs-6">
					<div class="fun-box">
						<div class="number">
							<?php echo $datas->jumlah_guru?>
						</div>
						<div class="number-title">
							guru dan staff
						</div>
					</div> <!-- /.fun-box -->
				</div> <!-- /.col-md-3 -->
				<div class="col-sm-3 col-xs-6">
					<div class="fun-box">
						<div class="number">
							<?php echo $datas->jumlah_jurusan?>
						</div>
						<div class="number-title">
							Jurusan
						</div>
					</div> <!-- /.fun-box -->
				</div> <!-- /.col-md-3 -->
				<div class="col-sm-3 col-xs-6">
					<div class="fun-box">
						<div class="number">
							<?php echo $datas->jumlah_partner_instansi?>
						</div>
						<div class="number-title">
							partner instansi
						</div>
					</div> <!-- /.fun-box -->
				</div> <!-- /.col-md-3 -->
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</section> <!-- /.fun -->
<?php ?>

<!-- Note -->
	<section class="note purple">
		<div class="container section-wrapper text-center">
			<p class="quote">
				“If geek means you're willing to study things, and if you think science and engineering matter, I plead guilty. If your culture doesn't like geeks, you are in real trouble.”
			</p> <!-- /.quote -->
			<div class="quoter">Bill Gates</div>
		</div> <!-- /.container -->
	</section> <!-- /.note -->
