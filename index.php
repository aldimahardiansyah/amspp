<?php
@session_start();
require_once 'koneksi.php';
if (@$_SESSION['tata usaha'] || @$_SESSION['admin'] || @$_SESSION['siswa'] ) {
    if (@$_SESSION['tata usaha']) {

        $userlogin = @$_SESSION['tata usaha'];
    } else if (@$_SESSION['admin']) {
        $userlogin =  @$_SESSION['admin'];
    }
    else{
        $userlogin =  @$_SESSION['siswa'];
    }



    $sql  =  mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$userlogin'");

    $login  =  mysqli_fetch_object($sql);


?>

<!DOCTYPE html>

<html>
<?php
    $sql = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah='1'");
    $data = mysqli_fetch_object($sql);
    ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/img/sekolah/<?php echo $data->logo_sekolah ?>">
    <title>AM - SPP | <?php echo $data->nama_sekolah ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/skin-blue.min.css">
    <link rel="stylesheet" href="dist/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <!-- <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and
        media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php
if (@$_SESSION['tata usaha'] || @$_SESSION['admin']){

    if ($login->status_akun == "blok") {
    ?>
<section class="content">
    <div class="callout callout-danger">
        <h4>Maaf! <span class="glyphicon glyphicon-warning-sign"></span></h4>

        <p>Akun anda telah di blokir. Silahkan hubungi admin&nbsp;&nbsp;<a href="logout.php"
                class="btn btn-warning">OK</a></p>

    </div>
</section>
<?php
    }
    if ($login->status_akun == "use") {
    ?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->

            <a href="?page=dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>AM</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>AM - SPP </b></span>
            </a>


            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">



                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="logout.php">Logout &nbsp;&nbsp; <span
                                            class="glyphicon glyphicon-off"></span></a></li>
                                <table>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </ul>
                        </div>
                        <!-- Messages: style can be found in dropdown.less-->


                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="assets/img/user/<?php echo $login->foto; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <a href="?page=profil_user"><b><?php echo $login->nama; ?></b></a>
                        <!-- Status --><br><br>
                        <a href="?page=profil_user"><i class="glyphicon glyphicon-user"></i>
                            <?php echo $login->type_user; ?></a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="?page=siswa" method="post" class="sidebar-form" accept-charset="utf.8">
                    <div class="input-group">
                        <input type="text" name="search-siswa" class="form-control" placeholder="Cari Siswa...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="treeview">
                        <a href="?page=dashboard"><i class="fa fa-book"></i> <span>Master Data</span>
                            <span class="pull-right-container">
                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=siswa"> <i class="fa fa-users"></i>Siswa</a></li>
                            <li><a href="?page=kelas"><i class="fa fa-bank"></i>Kelas</a></li>
                            <li><a href="?page=tahun_ajaran"><i class="fa fa-calendar-alt"></i>Tahun Ajaran</a></li>

                        </ul>
                    </li>
                    <li><a href="?page=pembayaran_siswa"><i class="fa fa-money
                    "></i> <span>Pembayaran
                                Siswa</span></a></li>
                    <li><a href="?page=user"><i class="glyphicon glyphicon-user"></i> <span>User</span></a></li>

                    <li><a href="?page=kasir"><i class="glyphicon glyphicon-tasks"></i> <span>Laporan</span>
                            <span class="pull-right-container">
                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=laporan_per_kelas"><span
                                        class="glyphicon glyphicon-list-alt"></span>&nbsp;Lap. Pemb. Per  Kelas</a></li>
                            <li><a href="?page=rekap"><span
                                        class="glyphicon glyphicon-list-alt"></span>&nbsp;Rekapitulasi Pembayaran</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=pengaturan_sekolah"><i class="fa fa-gear"></i>
                        <span>Pengaturan Sekolah</span></a>
                    </li>

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <?php
                        $page = @$_GET['page'];
                        if ($page == "") {
                            $page = "dashboard";
                        }
                        include "$page.php";
                        ?>

            </section>

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <?php
                    $ig = "https://www.instagram.com/aldi.mds";
                    $cr = "@aldi.mds";
                    ?>
            <div class="pull-right hidden-xs">
                Follow Me <a href="<?php echo $ig ?>">@aldi.mds</a> (Instagram)
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="<?php echo $ig ?>"> <?php echo $cr ?> </a>.</strong>
            All
            rights reserved.
        </footer>


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="dist/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
<?php } 
}else{ 
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->

            <a href="?page=dashboard" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>AM</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>AM - SPP </b></span>
            </a>


            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">



                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav navbar-right">

                                <li><a href="logout.php">Logout &nbsp;&nbsp; <span
                                            class="glyphicon glyphicon-off"></span></a></li>
                                <table>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </table>
                            </ul>
                        </div>
                        <!-- Messages: style can be found in dropdown.less-->


                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="assets/img/user/<?php echo $login->foto; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <a href="?page=profil_user"><b><?php echo $login->nama; ?></b></a>
                        <!-- Status --><br><br>
                        <a href="?page=profil_user"><i class="glyphicon glyphicon-user"></i>
                            <?php echo $login->type_user; ?></a>
                    </div>
                </div>

                <!-- search form (Optional) -->
                <form action="?page=siswa" method="post" class="sidebar-form" accept-charset="utf.8">
                    <div class="input-group">
                        <input type="text" name="search-siswa" class="form-control" placeholder="Cari Siswa...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->

                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <li class="header">MENU</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li><a href="?page=dashboard"><i class="fa fa-dashboard"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <li class="treeview">
                        <a href="?page=dashboard"><i class="fa fa-book"></i> <span>Master Data</span>
                            <span class="pull-right-container">
                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=siswa"> <i class="fa fa-users"></i>Siswa</a></li>
                            <li><a href="?page=kelas"><i class="fa fa-bank"></i>Kelas</a></li>
                            <li><a href="?page=tahun_ajaran"><i class="fa fa-calendar-alt"></i>Tahun Ajaran</a></li>

                        </ul>
                    </li>
                    <li><a href="?page=pembayaran_siswa"><i class="fa fa-money
                    "></i> <span>Pembayaran
                                Siswa</span></a></li>
                    <li><a href="?page=user"><i class="glyphicon glyphicon-user"></i> <span>User</span></a></li>

                    <li><a href="?page=kasir"><i class="glyphicon glyphicon-tasks"></i> <span>Laporan</span>
                            <span class="pull-right-container">
                                <i class="glyphicon glyphicon-triangle-bottom"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="?page=laporan_per_kelas"><span
                                        class="glyphicon glyphicon-list-alt"></span>&nbsp;Lap. Pemb. Per  Kelas</a></li>
                            <li><a href="?page=rekap"><span
                                        class="glyphicon glyphicon-list-alt"></span>&nbsp;Rekapitulasi Pembayaran</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=pengaturan_sekolah"><i class="fa fa-gear"></i>
                        <span>Pengaturan Sekolah</span></a>
                    </li>

                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <?php
                        $page = @$_GET['page'];
                        if ($page == "") {
                            $page = "dashboard";
                        }
                        include "$page.php";
                        ?>

            </section>

        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <?php
                    $ig = "https://www.instagram.com/aldi.mds";
                    $cr = "@aldi.mds";
                    ?>
            <div class="pull-right hidden-xs">
                Follow Me <a href="<?php echo $ig ?>">@aldi.mds</a> (Instagram)
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2020 <a href="<?php echo $ig ?>"> <?php echo $cr ?> </a>.</strong>
            All
            rights reserved.
        </footer>


        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->


    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.2.3 -->
    <script src="dist/js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
<?php
} 
} else {
    header("location: login.php");
}

?>

</html>