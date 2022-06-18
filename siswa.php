<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-user"></span>
        Manajemen Data Siswa</h1>
</div>


<section class="content content-awal">
    <h4>Data Siswa</h4>
    <div class="list-form">
        <ul>
            <?php
            if ($login->type_user == "admin"){               
            ?>
            <li><a href="?page=tambah_siswa">
                    <button class="btn3">Tambah Data</button></a>
            </li>
        <?php }?>
            <li>
                <form method="POST" class="form1">
                    <select class="form1" id="kelas" name="kelas">
                        <option value="1" selected> -Pilih Kelas- </option>

                        <?php
                        $query1 = "SELECT * FROM kelas";
                        $sql1 = mysqli_query($koneksi, $query1);
                        while ($data1 = mysqli_fetch_object($sql1)) {
                        ?>

                        <option value="<?= $data1->nama_kelas; ?>"><?= $data1->nama_kelas; ?></option>

                        <?php } ?>
                    </select>
                    <input class="btn1" type="submit" name="simpan" value="Tampilkan">
                </form>
            </li>
            <li>
                <form method="POST">
                    <input class="form1" type="search" id="search-siswa" name="search-siswa"
                        placeholder="Masukkan Nama/NISN/NIS">
                    <input class="btn2" type="submit" name="search" value="Search">
                </form>
            </li>
        </ul>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr bgcolor="#CCCCCC"">
                    <th>No.</th>
                    <th>NIS</th>
                    <th>NISN</th>
                    <th>Nama Siswa</th>
                    <th>L/P</th>
                    <th>Kelas</th>
                    <th>Telp.</th>
                    <th>Alamat</th>
                    <?php
                    if ($login->type_user == "admin"){               
                    ?>
                    <th>Password</th>
                    <th>Aksi</th>
                <?php }?>

                </tr>
            </thead>

            <?php
            if (isset($_POST['simpan'])) {
                $kls = $_POST['kelas'];
                if ($kls == 1) {
                    $query   = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY nama ASC";
                } else {
                    if (isset($_POST['simpan'])) {
                        $query   = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nama_kelas='$kls' ORDER BY nama ASC";
                        echo "<br>Menampilkan Siswa Kelas : ";
                        echo $kls;
                    } else {
                        $query   = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY nama ASC";
                    }
                }
            } elseif (isset($_POST['search'])) {
                $cari = $_POST['search-siswa'];
                $query = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas WHERE nama LIKE '%" . $cari . "%' OR nisn LIKE '%" . $cari . "%' OR nis LIKE '%" . $cari . "%'  ORDER BY nama ASC";
                echo "Menampilkan Hasil Pencarian untuk: ";
                echo $cari;
            } else {
                $query   = "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas ORDER BY nama ASC";
            }
            $sqli  = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_object($sqli)) {


                @$no++;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->nis; ?></td>
                    <td><?php echo $data->nisn; ?></td>
                    <td><?php echo $data->nama; ?></td>
                    <td><?php echo $data->jk; ?></td>
                    <td><?php echo $data->nama_kelas; ?></td>
                    <td><?php echo $data->nomor_telp; ?></td>
                    <td><?php echo $data->alamat; ?></td>

                    <?php
                    if ($login->type_user == "admin"){               
                    ?>
                    <td><?php echo $data->password;?></td>
                    <td>
                        <a class=" btn btn-info" href="?page=ubah_siswa&id=<?php echo $data->nisn; ?>"
                    onclick="return confirm('anda yakin ingin mengubah data?');"><i
                        class="glyphicon glyphicon-edit"></i></a>
                    <a class="btn btn-danger" href="?page=hapus_siswa&id=<?php echo $data->nisn; ?>"
                        onclick="return confirm('anda yakin ingin menghapus data?');"><i
                            class="glyphicon glyphicon-trash"></i></a>
                    </td>
                <?php }?>
                </tr>
                <?php

            }
            ?>
                </tbody>
        </table>
    </div>
    </div>
    </div>
</section>