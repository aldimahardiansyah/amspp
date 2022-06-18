<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Manajemen User</h1>
</div>


<section class="content content-awal">
    <h4>Data User</h4>

    <?php
    if ($login->type_user == "admin"){               
    ?>
    <ul>
        <li><a href="?page=tambah_user">
                <button class="btn btn3" style="background-color:#00aa00;"><span class="fa fa-plus">
                    </span>
                    Tambah Data</button></a>
        </li>
    </ul>
<?php }?>

    <section class="content content-awal">
        <div class="table-responsive">
            <table width="666" height="253" class="table table-striped">
                <thead>
                    <tr>
                        <th bgcolor="#CCCCCC" width="21" height="25">
                            <center>no</center>
                        </th>
                        <th bgcolor="#CCCCCC" colspan="3">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Foto
                        </th>
                        <th bgcolor="#CCCCCC" width="21" height="25">Data</th>
                        <?php
          if ($login->type_user == "admin") {
            ?>
                        <th bgcolor="#CCCCCC" width="21" height="25">
                            <center>Aksi</center>
                        </th>
                        <?php } ?>
                    </tr>
                </thead>
                <?php
      $query   = "SELECT * FROM tb_user WHERE status_akun='use'";
      $sql  = mysqli_query($koneksi, $query);
      while ($data = mysqli_fetch_object($sql)) {
        @$no++;
            ?>
                <tbody>
                    <tr>
                        <td rowspan="6"><?php echo $no ?></td>
                        <td width="135" rowspan="6"><img class="img-circle" alt=" Foto User" width="190" height="190"
                                src="assets/img/user/<?php echo $data->foto; ?>" width="130" height="200"></td>
                        <td width="114">Nama</td>
                        <td width="10">:</td>
                        <td width="270"><?php echo $data->nama; ?></td>
                        <?php
                      if ($login->type_user == "admin") {
                        ?>
                        <td rowspan="6" style=" text-align: center;">
                            <a class="btn btn-info btn2" style="margin:3px; width:80px;"
                                href="?page=ubah_user&id=<?php echo $data->id_user; ?>"
                                onclick="return confirm('anda yakin ingin mengubah data?');" title="Edit"><span
                                    class="glyphicon glyphicon-edit"></span> Edit</a><br><br>
                            <a class="btn btn-danger btn2" style="margin:3px; width:80px;background-color:#af0000;"
                                href="?page=hapus_user&id=<?php echo $data->id_user; ?>"
                                onclick="return confirm('anda yakin ingin menghapus data?');" title="Hapus"><span
                                    class="glyphicon glyphicon-trash"></span> Hapus</a><br><br>

                            <a class="btn btn-danger btn2" style="margin:3px; width:80px;background-color:#ffaa00;"
                                href="?page=blok_akun&id=<?php echo $data->id_user; ?>"
                                onclick="return confirm('anda yakin ingin memblokir akun?');" Title="Blokir"><span
                                    class="glyphicon glyphicon-ban-circle"></span> Blokir</a>

                        </td><?php } ?>
                    </tr>
                    <tr>
                        <td>Alamat Email</td>
                        <td>:</td>
                        <td><?php echo $data->email; ?></td>
                    </tr>
                    <tr>
                        <td>Telepon / HP</td>
                        <td>:</td>
                        <td><?php echo $data->telp; ?></td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td>:</td>
                        <td><?php echo $data->username; ?></td>
                    </tr>
                    <tr>
                        <td>Tipe Pengguna</td>
                        <td>:</td>
                        <td><?php echo $data->type_user; ?></td>
                    </tr>
                    <?php }
 ?>
                </tbody>
            </table>
    </section>


    <a href="?page=akun_yang_diblok" class="btn btn-info">Lihat Akun Yang Diblokir&nbsp;&nbsp;<span
            class="glyphicon glyphicon-chevron-right"></span></a>
</section>