<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Transaksi Pembayaran</h1>
</div>

<?php
$thn_tampil = $_GET['st'];
$date = date('Y-m-d');
$ids        = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nisn='$ids'");
$data = mysqli_fetch_object($sql);
?>

<!-- =============================================================================================================== -->

<!-- ================================================= Detail Siswa ================================================ -->
<section class="content content-awal">
    <h4>Informasi Siswa</h4>
    <table class="table table-striped">
        <tr>
            <td class="col-sm-2">NIS</td>
            <td width="4px">:</td>
            <td><?php echo $data->nis ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">NISN</td>
            <td width="4px">:</td>
            <td><?php echo $data->nisn ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Nama siswa</td>
            <td width="4px">:</td>
            <td><?php echo $data->nama ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Kelas</td>
            <td width="4px">:</td>
            <td><?php echo $data->nama_kelas ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Jenis Kelamin</td>
            <td width="4px">:</td>
            <td><?php echo $data->jk ?></td>
        </tr>
        <tr>
            <td class="col-sm-2">Alamat</td>
            <td width="4px">:</td>
            <td><?php echo $data->alamat ?></td>
        </tr>
    </table>
</section>

<!-- =============================================================================================================== -->

<!-- ==================================================  Filter Tagihan  =========================================== -->

<section class="content content-awal">
    <h4>Tagihan filter</h4>
    <div>
        <form method="POST">
            <span style="font-size:15px; font-weight:bold;" class="col-sm-2">Pilih Tahun Ajaran</span>
            <select class="col-sm-4" id="tahun_ajar" name="tahun_ajar"
                style="width: 200px;height:30px;border-radius:4px;">

                <?php
                $query_tahun = "SELECT * FROM tahun_ajaran";
                $sql_tahun = mysqli_query($koneksi, $query_tahun);
                while ($data1 = mysqli_fetch_object($sql_tahun)) {
                ?>

                <option value="<?= $data1->tahun_ajaran; ?>" <?php if ($data1->status == 'Aktif') { ?> selected
                    <?php } ?> ?><?= $data1->tahun_ajaran; ?> (
                    <?= $data1->status; ?> ) </option>

                <?php } ?>
            </select>
            <input style="margin-left: 5px" class="btn2" type="submit" name="simpan" value="Tampilkan">
        </form>
        <?php if(isset($_POST['simpan'])){?>
        <div class="result">
            <?php echo "Menampilkan Tagihan di Tahun Ajaran ";
            echo "<b>";
            echo $_POST['tahun_ajar'];
            echo "</b>:";
        ?></div> <?php }?>
    </div>
</section>

<!-- ================================================================================================================ -->

<!-- ===================================================  Detail Tagihan  ================================== -->

<section class="content content-awal">
    <h4>Tagihan SPP</h4>
    <div class="table-responsive">

        <?php
            $pemisah_Desimah = ",";
            $jumlah_desimal = "0";
            $pemisah_ribuan  = ".";
            if (isset($_POST['simpan'])) {
                $select_tahun = $_POST['tahun_ajar'];
                $query1   = "SELECT id_tagihan, tagihan_spp.status, nisn, nama_bulan, tagihan_spp.id_jebar, tgl_bayar, tagihan_spp.id_tahun, nama_pembayaran, frekuensi, tarif, tahun_ajaran FROM tagihan_spp INNER JOIN jenis_bayar ON tagihan_spp.id_jebar=jenis_bayar.id_jebar INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nisn='$ids' AND tahun_ajaran='$select_tahun'";
            } else {
                $query1   = "SELECT id_tagihan, tagihan_spp.status, nisn, nama_bulan, tagihan_spp.id_jebar, tgl_bayar, tagihan_spp.id_tahun, nama_pembayaran, frekuensi, tarif, tahun_ajaran FROM tagihan_spp INNER JOIN jenis_bayar ON tagihan_spp.id_jebar=jenis_bayar.id_jebar INNER JOIN tahun_ajaran ON tagihan_spp.id_tahun=tahun_ajaran.id_tahun WHERE nisn='$ids' AND tahun_ajaran='$thn_tampil'";
            }
            $sqli1  = mysqli_query($koneksi, $query1);
            if($sqli1->num_rows==0){?>
        <p style="text-align:center; color:#777; margin-top:30px; margin-bottom:30px; font-size:20px;">Tidak Ada Tagihan
            di Tahun
            <b><?php echo $_POST['tahun_ajar'];?></b>!
        </p>
        <?php } else{
            ?>

        <!-- =========================================== Tabel Tagihan ======================================================= -->

        <table class="table table-striped">
            <thead>
                <tr bgcolor="#CCCCCC">
                    <th>No.</th>
                    <th>Nama Bulan</th>
                    <th>Tahun Ajaran</th>
                    <th>Tagihan</th>
                    <th>Status</th>
                    <th style=" text-align: center;">Tanggal Bayar</th>
                    <th style=" text-align: center;">Bayar</th>
                    <th style=" text-align: center;">Cetak</th>

                </tr>
            </thead>
            <?php
            while ($data3 = mysqli_fetch_object($sqli1)){
                $status = $data3->status;
                $thn_cetak = $data3->tahun_ajaran;
                @$no++;?>
            <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data3->nama_bulan; ?></td>
                    <td> <?php echo $data3->tahun_ajaran?></td>
                    <td>Rp.
                        <?php echo number_format($data3->tarif, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan) ?>
                    </td>
                    <td><?php if ($status == 1) {
                                echo "Lunas";
                            } else {
                                echo "Belum Bayar";
                            }
                            ?></td>

                    <!-- ================================================================================================================= -->
                    <!-- ======================================== Input Tanggal & Tombol Bayar =========================================== -->

                    <?php 
                    $query_st   = "SELECT * FROM tahun_ajaran WHERE status='Aktif'";
                    $sqli_st = mysqli_query($koneksi, $query_st);
                    $data_st = mysqli_fetch_object($sqli_st);
                    $st = $data_st->tahun_ajaran;
                    
                    if ($status == 1) { ?>
                    <td style=" text-align: center;">
                        <form
                            action="?page=bayar&id=<?php echo $data3->id_tagihan ?>&status=<?php echo $status 
                            ?>&ids=<?php echo $data->nisn ?>&st=<?php if(isset($_POST['simpan'])){ echo $_POST['tahun_ajar']; } else{ echo $st; }?>"
                            method="POST">

                            <input disabled style="height: 30px;width: 140px;border-radius: 4px;" name="date" type="date"
                                value="<?php echo $data3->tgl_bayar; ?>">
                    </td>
                    <?php } else { ?>
                    <td style=" text-align: center;">

                        <form
                            action=" ?page=bayar&id=<?php echo $data3->id_tagihan ?>&status=<?php echo $status 
                            ?>&ids=<?php echo $data->nisn ?>&st=<?php if(isset($_POST['simpan'])){ echo $_POST['tahun_ajar']; } else{ echo $st; }?>"
                            method="POST">

                            <input style="height: 30px;width: 140px;border-radius: 4px;" name="date" type="date"
                                value="<?php echo $date; ?>">
                    </td><?php } ?>

                    <td style=" text-align: center;">
                        <?php if ($status == 1) { ?>
                        <button type="submit" name="Bayar" class=" btn4 fa fa-close"></button>
                        <?php } else { ?>
                        <button type="submit" name="Bayar" class=" btn5">Bayar</button> <?php } ?>
                    </td>
                    </form>

                    <!-- ================================================================================================================= -->
                    <!-- ================================================== Tombol Cetak ================================================= -->
                    <td style=" text-align: center;">
                        <?php if ($status == 1) { ?>
                        <a href="cetak-tagihan.php?id=<?php echo $data3->id_tagihan ?>&ids=<?php echo $ids ?>&ul=<?php echo $userlogin ?>" target="blank">
                            <button name="cetak" class="btn5"> <i class="fa fa-print"> </i>&nbsp; Cetak</button> </a>
                        <?php } else { ?>
                        <button name="cetak" class="btn5a" disabled> <i class="fa fa-print"> </i>&nbsp;
                            Cetak</button>
                    </td>

                    <!-- ================================================================================================================ -->

                    <?php } ?>
                </tr> <?php
                        }}
                            ?>
            </tbody>
        </table>

<hr>
        <div><a href="cetak-seluruh-tagihan.php?ids=<?php echo $ids ?>&ul=<?php echo $userlogin ?>&st=<?php  echo $thn_cetak;?>" target="blank">
            <button class="btn1"><span class="fa fa-print"> </span> Cetak Seluruh Tagihan</button></a>
        </div>
    </div>
</section>
<!-- ========================================================================================================== -->