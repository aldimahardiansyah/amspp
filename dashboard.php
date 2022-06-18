<div class="content-header">
    <h1>
        <span class="fa fa-dashboard"></span>
        Dashboard</h1>
</div>
<section class="content content-awal">
    <?php
    $query   = "SELECT * FROM sekolah WHERE id_sekolah='1'";
    $sql  = mysqli_query($koneksi, $query);
    while ($data = mysqli_fetch_object($sql)) {

        foreach ($sql as $sqli) {
            if (count($sqli) > 0) {
    ?>
    <?php
                $kuery = "SELECT * FROM tb_user WHERE id_user='$userlogin'";
                $lxt = mysqli_query($koneksi, $kuery);
                while ($dat = mysqli_fetch_object($lxt)) {
                ?>
    <h4>Hallo, <?php echo $dat->nama ?>!</h4>
    <?php } ?>

<div style="float: right; width: 45%;">
        <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">GURU DAN STAFF</span>
            <span class="info-box-value"><?php echo $data->jumlah_guru; ?></span>
        </div>
    </div>

     <div class="info-box">
        <span class="info-box-icon bg-blue"><i class="fa fa-steam"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">EKSTRAKURIKULER</span>
            <span class="info-box-value"><?php echo $data->jumlah_ekskul; ?></span>
        </div>
    </div>

     <div class="info-box">
        <span class="info-box-icon bg-purple"><i class="fa fa-tasks"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">JURUSAN</span>
            <span class="info-box-value"><?php echo $data->jumlah_jurusan; ?></span>
        </div>
    </div>

     <div class="info-box">
        <span class="info-box-icon bg-orange"><i class="fa fa-bank"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">PARTNER INSTANSI</span>
            <span class="info-box-value"><?php echo $data->jumlah_partner_instansi; ?></span>
        </div>
    </div>
</div>

<div style="width: 45%;">
    <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">NAMA SEKOLAH</span>
            <span class="info-box-value"><?php echo $data->nama_sekolah; ?></span>
        </div>
    </div>
    <div class="info-box">
        <span class="info-box-icon bg-lime"><i class="glyphicon glyphicon-user"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">NAMA KEPALA SEKOLAH</span>
            <span class="info-box-value"><?php echo $data->nama_kepsek; ?></span>
        </div>
    </div>
    <div class="info-box">
        <span class="info-box-icon"><i class="fa fa-user">
            </i> </span>
        <div class="info-box-content">
            <span class="info-box-text">SISWA AKTIF</span>
            <?php
                        $kueri = "SELECT nisn FROM siswa";
                        $sqll = mysqli_query($koneksi, $kueri);
                        $jml = mysqli_num_rows($sqll);
                        ?>
            <span class="info-box-value"><?php echo $jml; ?></span>
        </div>
    </div>
    <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
            <?php
                        $ueri = "SELECT * FROM tb_user WHERE status_akun='use'";
                        $ssqll = mysqli_query($koneksi, $ueri);
                        $jmlh = mysqli_num_rows($ssqll);
                        $bln = date('m');
                        $thn = date('Y');
                        ?>
            <span class="info-box-text">USER AKTIF</span>
            <span class="info-box-value"><?php echo $jmlh; ?></span>
        </div>
    </div>
</div>
    <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-usd"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">TOTAL PEMASUKAN BULAN INI (<?php
                                                                                switch ($bln) {
                                                                                    case 01:
                                                                                        echo "Januari ";
                                                                                        break;
                                                                                    case 02:
                                                                                        echo "Februari ";
                                                                                        break;
                                                                                    case 3:
                                                                                        echo "Maret ";
                                                                                        break;
                                                                                    case 04:
                                                                                        echo "April ";
                                                                                        break;
                                                                                    case 05:
                                                                                        echo "Mei ";
                                                                                        break;
                                                                                    case 06:
                                                                                        echo "Juni ";
                                                                                        break;
                                                                                    case 07:
                                                                                        echo "Juli ";
                                                                                        break;
                                                                                    case 8:
                                                                                        echo "Agustus";
                                                                                        break;
                                                                                    case 9:
                                                                                        echo "September ";
                                                                                        break;
                                                                                    case 10:
                                                                                        echo "Oktober ";
                                                                                        break;
                                                                                    case 11:
                                                                                        echo "November";
                                                                                        break;
                                                                                    case 12:
                                                                                        echo "Desember ";
                                                                                        break;
                                                                                }
                                                                                echo $thn; ?>)</span>
            <span class="info-box-value">
                <?php
                            $pemisah_Desimah = ",";
                            $jumlah_desimal = "0";
                            $pemisah_ribuan  = ".";
                            $sql1 = mysqli_query($koneksi, "SELECT SUM(tarif) FROM jenis_bayar INNER JOIN tagihan_spp ON jenis_bayar.id_jebar=tagihan_spp.id_jebar WHERE STATUS='1' AND month(tgl_bayar)='$bln'");
                            $data = mysqli_fetch_object($sql1);
                            foreach ($data as $sql2) {
                                echo "Rp. ";
                                echo number_format($sql2, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
                            }
                            ?></span>
        </div>
    </div>

    <?php }
        }
    } ?>
</section>