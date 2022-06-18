<?php
include 'koneksi.php';
$kls    =$_GET['kls'];
$thn    =$_GET['thn'];
$userlogin=$_GET['ul'];

// =============================================== Query Sekolah ========================================

$query = "SELECT * FROM sekolah WHERE id_sekolah='1'";
$sql    = mysqli_query($koneksi, $query);
while($data=mysqli_fetch_object($sql)){

// =====================================================================================================
// ============================================= Query TU/Admin(User) ======================================

$sql3  =  mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$userlogin'");
    $login  =  mysqli_fetch_object($sql3);

// =========================================================================================================

?>


<!DOCTYPE html>
<html>
<head>
    <title>LAPORAN PEMBAYARAN SPP KELAS <?php echo $kls;?></title>
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

<div>
    <div style="float: left;">
        <img src="assets/img/sekolah/<?php echo $data->logo_sekolah ?>" alt=" Logo Sekolah" width="85px">
    </div>

    <div style="text-align: center; margin-right: 75px; margin-bottom: 30px;">
        <h2><?php echo $data->nama_sekolah ?></h2>
        <p><i><?php echo $data->alamat_sekolah ?></i></p>
    </div>
  <?php }?>
    <hr/>
</div>

 <!-- ========================================== EndHeader =================================================== -->
<section class="content content-awal">
    <h4 style="margin-top: -10px; margin-bottom: 30px; text-align: center;">LAPORAN PEMBAYARAN SPP KELAS <?php echo $kls;?> TAHUN <?php echo $thn;?></h4>
    <div>
        <table class="table table-striped">
                <tr bgcolor="#CCCCCC"">
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Jul</th>
                    <th>Aug</th>
                    <th>Sep</th>
                    <th>Oct</th>
                    <th>Nov</th>
                    <th>Dec</th>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>Mei</th>
                    <th>Jun</th>

                </tr>
            <?php
// ========================================== Query siswa =================================================

            $query   = "SELECT * FROM tagihan_spp INNER JOIN siswa ON tagihan_spp.nisn=siswa.nisn INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_kelas='$kls' AND tahun_ajaran='$thn' AND nama_bulan='juli' ORDER BY nama ASC";

            $sqli  = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_object($sqli)) {
                @$no++;

// ==========================================================================================================
// ========================================== Query Bulan Pembayaran =========================================
// =========================================== Query Juli ===================================================

$query_jul   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Juli' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_jul    = mysqli_query($koneksi, $query_jul);
$data_jul   = mysqli_fetch_object($sql_jul);

// ============================================================================================================
// =========================================== Query Agustus ===================================================

$query_aug   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Agustus' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_aug    = mysqli_query($koneksi, $query_aug);
$data_aug   = mysqli_fetch_object($sql_aug);

// ============================================================================================================
// =========================================== Query September ===================================================

$query_sep   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'September' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_sep    = mysqli_query($koneksi, $query_sep);
$data_sep   = mysqli_fetch_object($sql_sep);

// ============================================================================================================
// =========================================== Query Oktober ===================================================

$query_oct   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Oktober' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_oct    = mysqli_query($koneksi, $query_oct);
$data_oct   = mysqli_fetch_object($sql_oct);

// ============================================================================================================
// =========================================== Query November ===================================================

$query_nov   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'November' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_nov    = mysqli_query($koneksi, $query_nov);
$data_nov   = mysqli_fetch_object($sql_nov);

// ============================================================================================================
// =========================================== Query Desember ===================================================

$query_dec   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Desember' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_dec    = mysqli_query($koneksi, $query_dec);
$data_dec   = mysqli_fetch_object($sql_dec);

// ============================================================================================================
// =========================================== Query Januari ===================================================

$query_jan   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Januari' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_jan    = mysqli_query($koneksi, $query_jan);
$data_jan   = mysqli_fetch_object($sql_jan);

// ============================================================================================================
// =========================================== Query Februari ===================================================

$query_feb   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Februari' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_feb    = mysqli_query($koneksi, $query_feb);
$data_feb   = mysqli_fetch_object($sql_feb);

// ============================================================================================================
// =========================================== Query Maret ===================================================

$query_mar   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Maret' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_mar    = mysqli_query($koneksi, $query_mar);
$data_mar   = mysqli_fetch_object($sql_mar);

// ============================================================================================================
// =========================================== Query April ===================================================

$query_apr   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'April' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_apr    = mysqli_query($koneksi, $query_apr);
$data_apr   = mysqli_fetch_object($sql_apr);

// ============================================================================================================
// =========================================== Query Mei ===================================================

$query_Mei   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Mei' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_mei    = mysqli_query($koneksi, $query_Mei);
$data_mei   = mysqli_fetch_object($sql_mei);

// ============================================================================================================
// =========================================== Query Juni ===================================================

$query_jun   =   "SELECT tagihan_spp.status FROM tagihan_spp INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_bulan = 'Juni' AND nisn ='$data->nisn' AND tahun_ajaran='$thn'";
$sql_jun    = mysqli_query($koneksi, $query_jun);
$data_jun   = mysqli_fetch_object($sql_jun);

// ============================================================================================================
// =============================================================================================================
$lunas      = "<i class='fa fa-check' style='color:#00aa00;'>";
$belum      = "<i class='fa fa-times' style='color:#ff0000;'>";
            ?>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->nis; ?></td>
                    <td><?php echo $data->nama; ?></td>
                    <td>
                        <?php if($data_jul->status==1){
                                echo $lunas;
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td><?php if($data_aug->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_sep->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_oct->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_nov->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_dec->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_jan->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_feb->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_mar->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_apr->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_mei->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>
                    <td>
                        <?php if($data_jun->status==1){
                            echo "$lunas";
                            } else{
                                echo $belum;
                            }
                        ?>
                    </td>

                </tr>
                <?php

            }
            ?>
        </table>
        <hr>

<!-- ========================================= TTD ======================================================= -->

    <div style="text-align: center; margin-top: 0px; float: right; margin-right: 80px;">
        <p>Tata Usaha,</p>
        <br><br>
        <p style="font-weight: bold; text-decoration: underline;"><?php echo $login->nama; ?></p>
    </div>

<!-- ==================================================================================================== -->

        <div>
            <p style="float: left;">Keterangan :</p>
            <div style="margin-left: 80px;">
                <p><i style="color: #00aa00;" class="fa fa-check"></i> <span style="margin-left: 5px;"> = Lunas</span> </p>
                <p><i style="color: #ff0000;" class="fa fa-times"></i> <span style="margin-left: 8px;"> = Belum Bayar</span> </p>
            </div>
        </div>
    </div>
    </div>
    </div>
    
</section>

<script>
    window.print();
</script>
</body>
</html>