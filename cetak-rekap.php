<?php 
include 'koneksi.php';

$userlogin=$_GET['ul'];
$tgl1   =$_GET['tgl1'];
$tgl2   =$_GET['tgl2'];

$pemisah_Desimah = ",";
$jumlah_desimal = "0";
$pemisah_ribuan  = ".";
$no=0;

// =============================================== Query Sekolah ========================================

$query = "SELECT * FROM sekolah WHERE id_sekolah='1'";
$sql 	= mysqli_query($koneksi, $query);
while($data=mysqli_fetch_object($sql)){

// =====================================================================================================
// ============================================= Query TU/Admin(User) ======================================

$sql3  =  mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$userlogin'");
    $login  =  mysqli_fetch_object($sql3);

// =========================================================================================================
// ============================================== Query Kelas ==============================================

$queryk  ="SELECT * FROM kelas ORDER BY nama_kelas ASC";
$sqlk    = mysqli_query($koneksi, $queryk); 

// ==========================================================================================================

?>


<!DOCTYPE html>
<html>
<head>
	<title>REKAPITULASI PEMBAYARAN SPP</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="assets/img/sekolah/<?php echo $data->logo_sekolah ?>">
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
</head>
<body>

 <!-- ===================================== Header =========================================================== -->

	<div style="float: left;">
		<img src="assets/img/sekolah/<?php echo $data->logo_sekolah ?>" alt=" Logo Sekolah" width="85px">
	</div>

	<div style="text-align: center; margin-right: 75px; margin-bottom: 30px;">
		<h2><?php echo $data->nama_sekolah ?></h2>
		<p><i><?php echo $data->alamat_sekolah ?></i></p>
	</div>
 
	<hr/>
 <?php }?>

 <!-- ========================================== EndHeader =================================================== -->

<section class="content content-awal">
	<h4>REKAPITULASI PEMBAYARAN SPP <small style="color: white"> <b> <?php 
    echo $tgl1?></b> s/d <b><?php echo $tgl2?></b></small> </h4>

    <table class="table table-striped">
            <tr bgcolor="#cccccc">
                <th style="text-align: center;">No</th>
                <th style="text-align: center;">Kelas</th>
                <th style="text-align: center;">Jumlah</th>
            </tr>
<?php while($datak = mysqli_fetch_object($sqlk)){
            $no++;?>
            <tr style="text-align: center;">
                <td><?php echo $no?></td>
                <td><?php echo $datak->nama_kelas?></td>
                <td><?php 
                    $query1 ="SELECT SUM(tarif) FROM jenis_bayar INNER JOIN tagihan_spp ON jenis_bayar.id_jebar=tagihan_spp.id_jebar 
                            INNER JOIN siswa ON siswa.nisn=tagihan_spp.nisn INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE STATUS='1' 
                            AND nama_kelas='$datak->nama_kelas' AND tgl_bayar BETWEEN '$tgl1' AND '$tgl2'";
                    $sql1   =mysqli_query($koneksi, $query1);
                    $data1  =mysqli_fetch_object($sql1);
                    foreach($data1 as $dataa){
                        if($dataa==NULL){
                            echo "Rp. ";
                                echo number_format($dataa, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
                        } else{
                        echo "Rp. ";
                                echo number_format($dataa, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
                    }
                    }
                    ?>
                    
                </td>
            </tr>
            <?php }?>
            <tr>
                <td style="text-align: left; max-width:80px;">
                </td>

                <td style="text-align: right;"><b>T O T A L :</b></td>
                <td style="text-align: center; font-weight: bold;">
                <?php 
                $query2 ="SELECT SUM(tarif) FROM jenis_bayar INNER JOIN tagihan_spp ON jenis_bayar.id_jebar=tagihan_spp.id_jebar 
                        INNER JOIN siswa ON siswa.nisn=tagihan_spp.nisn INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE STATUS='1' 
                        AND tgl_bayar BETWEEN '2020-01-01' AND '2020-03-31'";
                $sql2   =mysqli_query($koneksi, $query2);
                $data2  =mysqli_fetch_object($sql2);
                foreach($data2 as $data2a){
                                echo "Rp. ";
                                echo number_format($data2a, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
                    }
                ?>
                    
                </td>
            </tr>
    </table>

<!-- ========================================= TTD ======================================================= -->

<hr>
	<div style="text-align: center; margin-top: 0px; float: right; margin-right: 80px;">
		<p>Tata Usaha,</p>
		<br><br><br>
		<p style="font-weight: bold; text-decoration: underline;"><?php echo $login->nama; ?></p>
	</div>

<!-- ==================================================================================================== -->

</section>
 
	<script>
		window.print();
	</script>
	
</body>
</html>