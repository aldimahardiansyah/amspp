<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Manajemen Tahun Ajaran</h1>
</div>


<section class="content content-awal">
    <h4>Tahun Ajaran</h4>

    <?php
     if ($login->type_user == "admin"){               
    ?>
    <div class="list-form">
        <ul>
            <li><a href="?page=tambah_tahun">
                    <button class="btn3">Tambah Data</button></a>
            </li>
        </ul>
    </div>
<?php }?>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr bgcolor="#CCCCCC"">
                    <th>No.</th>
                    <th>ID Tahun</th>
                    <th>Tahun Ajaran</th>
                    <th>Status</th>

                    <?php
                    if ($login->type_user == "admin"){               
                    ?>
                    <th>Aksi</th>
                <?php }?>

                </tr>
            </thead>

            <?php
            $query   = "SELECT * FROM tahun_ajaran";
            $sqli  = mysqli_query($koneksi, $query);
            while ($data = mysqli_fetch_object($sqli)) {


                @$no++;
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->id_tahun; ?></td>
                    <td><?php echo $data->tahun_ajaran; ?></td>
                    <td><?php echo $data->status; ?></td>

                    <?php
                    if ($login->type_user == "admin"){               
                    ?>
                    <td>
                        <a class=" btn btn-info" href="?page=ubah_tahun&id=<?php echo $data->id_tahun; ?>"
                    onclick="return confirm('anda yakin ingin mengubah data?');"><i
                        class="glyphicon glyphicon-edit"></i></a>
                    <a class="btn btn-danger" href="?page=hapus_tahun&id=<?php echo $data->id_tahun; ?>"
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