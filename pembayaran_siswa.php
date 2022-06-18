<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Transaksi Pembayaran</h1>
</div>

<section class="content content-awal">
    <h4 class="pembayaran">Filter Data Pembayaran Siswa</h4>
    <label class="col-sm-2 control-label">Cari Siswa</label>
    <form method="POST">
        <div class="col-sm-8">
            <input class="form1 col-sm-12" type="search" id="search-siswa" name="search-siswa"
                placeholder="Masukkan Nama/NISN/NIS">
        </div>
        <div class="col-sm-2"><input class="btn2 col-sm-6" type="submit" name="search" value="Cari"></div>
    </form>
</section>

<!-- ============================================================================================================================
====================================================================================================================== -->

<?php
if (isset($_POST['search'])) {
?>

<!-- ====================================================================================================================
==================================================================================================================== -->
<section class="content content-awal">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr bgcolor="#00aaff">
                    <th style="color: #fff">NIS</th>
                    <th style="color: #fff">NISN</th>
                    <th style="color: #fff">Nama Siswa</th>
                    <th style="color: #fff">Jenis Kelamin</th>
                    <th style="color: #fff">Kelas</th>
                    <th style="color: #fff">Alamat</th>
                    <th style="color: #fff">Lihat Tagihan</th>

                </tr>
            </thead>

            <?php
                 $query_st   = "SELECT * FROM tahun_ajaran WHERE status='Aktif'";
                 $sqli_st = mysqli_query($koneksi, $query_st);
                 $data_st = mysqli_fetch_object($sqli_st);
                 $st = $data_st->tahun_ajaran;

                if (isset($_POST['search'])) {
                    $cari = $_POST['search-siswa'];
                    $query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nama LIKE '%" . $cari . "%' OR nisn LIKE '%" . $cari . "%' OR nis LIKE '%" . $cari . "%'";
                } else {
                    $query   = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas";
                }
                $sqli  = mysqli_query($koneksi, $query);
                while ($data = mysqli_fetch_object($sqli)) {

                ?>
            <tbody>
                <tr>
                    <td><?php echo $data->nis; ?></td>
                    <td><?php echo $data->nisn; ?></td>
                    <td><?php echo $data->nama; ?></td>
                    <td><?php echo $data->jk; ?></td>
                    <td><?php echo $data->nama_kelas; ?></td>
                    <td><?php echo $data->alamat; ?></td>
                    <td>
                        <a href="?page=tagihan_siswa&id=<?php echo $data->nisn; ?>&st=<?php echo $st?>">
                            <button class="btn2 col-sm-8">Lihat</button>
                        </a>
                    </td>
                </tr>
                <?php

                }
                    ?>
            </tbody>
        </table>
</section>
<?php } ?>