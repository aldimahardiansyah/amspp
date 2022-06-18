<?php 
include '../koneksi.php';

$id 	=$_GET['id'];
$ids 	=$_GET['ids'];
$userlogin=$_GET['ul'];
$pemisah_Desimah = ",";
$jumlah_desimal = "0";
$pemisah_ribuan  = ".";

// ========================================= Query Tagihan ===========================================

$query1	="SELECT id_tagihan, tagihan_spp.status, nisn, nama_bulan, tagihan_spp.id_jebar, tgl_bayar, tagihan_spp.id_tahun, nama_pembayaran, frekuensi, tarif, tahun_ajaran FROM tagihan_spp INNER JOIN jenis_bayar ON tagihan_spp.id_jebar=jenis_bayar.id_jebar INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE id_tagihan='$id'";
$sql1	=mysqli_query($koneksi, $query1);
while($data1=mysqli_fetch_object($sql1)){
	$status = $data1->status;

// =======================================================================================================
// =============================================== Query Sekolah ========================================

$query = "SELECT * FROM sekolah WHERE id_sekolah='1'";
$sql 	= mysqli_query($koneksi, $query);
while($data=mysqli_fetch_object($sql)){

// =====================================================================================================
// ================================================ Query Siswa ==========================================

$sql2 = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$ids'");
$data2 = mysqli_fetch_object($sql2);

// ========================================================================================================
// ============================================= Query TU/Admin(User) ======================================

$sql3  =  mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$userlogin'");
    $login  =  mysqli_fetch_object($sql3);

// =========================================================================================================

?>


<!DOCTYPE html>
<html>
<head>
	<title>Bukti Pembayaran SPP</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../assets/img/sekolah/<?php echo $data->logo_sekolah ?>">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/skin-blue.min.css">
    <link rel="stylesheet" href="../dist/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="../text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/font-awesome/css/fontawesome.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" type="text/css">
</head>
<body>

 <!-- ===================================== Header =========================================================== -->

	<div style="float: left;">
		<img src="../assets/img/sekolah/<?php echo $data->logo_sekolah ?>" alt=" Logo Sekolah" width="85px">
	</div>

	<div style="text-align: center; margin-right: 75px; margin-bottom: 30px;">
		<h2><?php echo $data->nama_sekolah ?></h2>
		<p><i><?php echo $data->alamat_sekolah ?></i></p>
	</div>
 
	<hr/>
 <?php }?>

 <!-- ========================================== EndHeader =================================================== -->

<!-- ========================================== Detail Siswa ================================================ -->
<section class="content content-awal">
    <h4>Siswa dengan Informasi sebagai berikut :</h4>
    <table class="table table-striped">
        <tr>
            <td class="col-sm-2">NIS</td>
            <td width="4px">:</td>
            <td><?php echo $data2->nis ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">NISN</td>
            <td width="4px">:</td>
            <td><?php echo $data2->nisn ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Nama siswa</td>
            <td width="4px">:</td>
            <td><?php echo $data2->nama ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Kelas</td>
            <td width="4px">:</td>
            <td><?php echo $data2->nama_kelas ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Jenis Kelamin</td>
            <td width="4px">:</td>
            <td><?php echo $data2->jk ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Alamat</td>
            <td width="4px">:</td>
            <td><?php echo $data2->alamat ?></td>
        </tr>
    </table>
</section>

<!-- ========================================================================================================= -->

<section class="content content-awal">
	<h4>Telah Berhasil Membayar SPP : </h4>
<table class="table table-striped">
	<tr bgcolor="#CCCCCC">
		<th>Bulan</th>
		<th>Tahun Ajaran</th>
		<th>Tagihan</th>
		<th>Tanggal Bayar</th>
		<th>Status</th>
	</tr>
	<tr>
		<td><?php echo $data1->nama_bulan?></td>
		<td><?php echo $data1->tahun_ajaran?></td>
		<td>Rp. <?php echo number_format($data1->tarif, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan) ?></td>
		<td><?php echo $data1->tgl_bayar ?></td>
		<td><?php if ($status == 1) {
                                echo "Lunas";
                            } else {
                                echo "Belum Bayar";
                            }
                            ?></td>
	</tr>

</table>

</section>
 
	<script>
		window.print();
	</script>
	
</body>
</html>
<?php } ?>