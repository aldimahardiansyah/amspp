<?php 
@session_start();
require_once '../koneksi.php';
$userlogin	= @$_SESSION['siswa'];

$sql_login 	= mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$userlogin' OR nis='$userlogin'");
$login		= mysqli_fetch_object($sql_login);

$year 	=date('Y');
// ========================================= Query Sekolah ===========================================
$query 	="SELECT * FROM sekolah WHERE id_sekolah='1'";
$sql 	=mysqli_query($koneksi, $query);
$datas	=mysqli_fetch_object($sql);

// ====================================================================================================
// ==================================== Query tahun ajaran aktif =========================================

$query1	="SELECT * FROM tahun_ajaran WHERE status='Aktif'";
$sql1	=mysqli_query($koneksi, $query1);

// =====================================================================================================
// ====================================== Query Siswa =================================================

$query2	="SELECT * FROM siswa";
$sql2	=mysqli_query($koneksi, $query2);

?>

<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie ie7 lte9 lte8 lte7" lang="en-US"><![endif]-->
<!--[if IE 8]><html class="ie ie8 lte9 lte8" lang="en-US">	<![endif]-->
<!--[if IE 9]><html class="ie ie9 lte9" lang="en-US"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="noIE" lang="en-US">
<!--<![endif]-->
	<head>
		<!-- meta -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
		<title>AM - SPP | <?php echo $datas->nama_sekolah ?></title>
		 <link rel="icon" href="../assets/img/sekolah/<?php echo $datas->logo_sekolah ?>">

		<link rel="stylesheet" type="text/css" href="../dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="../dist/css/ionicons.min.css">
    	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.theme.css">
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/one-page.css">
    <link rel="stylesheet" href="../dist/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
			<!--[if lt IE 9]>
				<script src="assets/js/html5shiv.js"></script>
				<script src="assets/js/respond.js"></script>
			<![endif]-->

			<!--[if IE 8]>
		    	<script src="assets/js/selectivizr.js"></script>
		    <![endif]-->
	</head>

<body>

        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <?php
                        $page = @$_GET['page'];
                        if ($page == "") {
                            $page = "home";
                        }
                        include "$page.php";
                        ?>

            </section>

        </div>

<!-- Footer -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="copy">
						Copyright &copy; <?php echo $year; echo " "; echo $datas->nama_sekolah;?>
					</div>
				</div>
				<div class="col-sm-4 text-center">
					<div class="social-icon">
						<a href="#">
							<div class="icon fb">
								<i class="fa fa-facebook"></i>
							</div>
						</a>
						<a href="#">
							<div class="icon twitter">
								<i class="fa fa-twitter"></i>
							</div>
						</a>
						<a href="#">
							<div class="icon" style="background-color: red;">
								<i class="fa fa-instagram"></i>
							</div>
						</a>
					</div>		
				</div>
				<div class="col-sm-4 text-right">
					<div class="copy">
						Developed by <a href="https://www.instagram.com/aldi.mds">@aldi.mds</a>. All Rights Reserved
					</div>
				</div>
			</div> <!-- /.row -->
		</div> <!-- /.container -->
	</footer>
	


	<script src="assets/js/jquery-1.11.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/contact.js"></script>
	<!-- // <script src="assets/js/smoothscroll.js"></script> -->
	<script src="assets/js/script.js"></script>


</body>
</html>