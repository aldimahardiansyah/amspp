<div class="content-header">
    <h1>
        <span class="fa fa-tasks"></span>
        Laporan Pembayaran Per Kelas</h1>
</div>

<!-- =============================================== Laporan Filter ============================================ -->

<section class="content content-awal">
    <h4 style="margin-top: 0px; margin-bottom: 20px;">Filter Data</h4>
    <div>
        <form method="POST">
            <span style="font-size:15px; font-weight:bold;" class="col-sm-2">Tahun Ajaran</span>
            <select class="col-sm-4" id="tahun_ajar" name="tahun_ajar"
                style="width: 200px;height:30px;border-radius:4px;margin-right: 30px;margin-left: -60px;">

                <option value="1" selected>-Pilih Tahun Ajaran-</option>
                <?php
                $query_tahun = "SELECT * FROM tahun_ajaran";
                $sql_tahun = mysqli_query($koneksi, $query_tahun);
                while ($data1 = mysqli_fetch_object($sql_tahun)) {
                ?>

                <option value="<?= $data1->tahun_ajaran; ?>"> <?= $data1->tahun_ajaran; ?> (
                    <?= $data1->status; ?> ) </option>

                <?php } ?>
            </select>

            <span style="font-size:15px; font-weight:bold;" class="col-sm-1">Kelas</span>

            <select class="col-sm-4" id="kelas" name="kelas" style="width: 200px;height:30px;border-radius:4px;margin-left: -20px;">
                        <option value="1" selected> -Pilih Kelas- </option>

                        <?php
                        $query1 = "SELECT * FROM kelas";
                        $sql1 = mysqli_query($koneksi, $query1);
                        while ($data1 = mysqli_fetch_object($sql1)) {
                        ?>

                        <option value="<?= $data1->nama_kelas; ?>"><?= $data1->nama_kelas; ?></option>

                        <?php } ?>
                    </select>

                    <input style="margin-left: 20px" class="btn5" type="submit" name="simpan" value="Tampilkan">
        </form>
        <?php if(isset($_POST['simpan'])){?>
        <div class="result">
            <?php if ($_POST['kelas']==1 or $_POST['tahun_ajar']==1){
                echo "Mohon Pilih Kelas dan Tahun Ajaran terlebih dahulu!";
            } else{
            echo "Menampilkan Laporan Pembayaran Kelas ";
            echo "<b>";
            echo $_POST['kelas'];
            echo "</b>";
            echo " Tahun Ajaran ";
            echo "<b>";
            echo $_POST['tahun_ajar'];
            echo "</b>:";
        }
        ?></div> <?php }?>
    </div>
</section>

<!-- ========================================================================================================== -->

<?php 
if(isset($_POST['simpan'])){
if($_POST['kelas']==1 or $_POST['tahun_ajar']==1){
            } else{ ?>
<section class="content content-awal">
    <h4 style="margin-top: 0px;">Laporan Pembayaran SPP</h4>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
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
            </thead>

            <?php
            if(isset($_POST['simpan'])){
                $kls=$_POST['kelas'];
                $thn=$_POST['tahun_ajar'];

// ========================================== Query siswa =================================================

            $query   = "SELECT * FROM tagihan_spp INNER JOIN siswa ON tagihan_spp.nisn=siswa.nisn INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nama_kelas='$kls' AND tahun_ajaran='$thn' AND nama_bulan='juli' ORDER BY nama ASC";
        }
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
            <tbody>
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
                </tbody>
        </table>
        <hr>
        <div style="float: right;"><a href="cetak_laporan_per_kelas.php?kls=<?php echo $kls; ?>&thn=<?php echo $thn;?>&ul=<?php echo $userlogin;?>" target="blank">
            <button class="btn1"><span class="fa fa-print"></span> Cetak Laporan Pembayaran</button></a>
        </div>
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
<?php }} ?>