<div class="table-responsive">
    <table width="666" height="253" class="table table-striped">
        <thead>
            <tr>
                <th bgcolor="#CCCCCC" colspan="3">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Foto
                </th>
                <th bgcolor="#CCCCCC" width="21" height="25">Data</th>

            </tr>
        </thead>
        <?php
        $query   = "SELECT * FROM tb_user WHERE id_user = '$userlogin'";
        $sql  = mysqli_query($koneksi, $query);
        while ($data = mysqli_fetch_object($sql)) {
            @$no++;

            foreach ($sql as $sqli) {
                if (count($sqli) > 0) {
        ?>
        <tbody>
            <tr>
                <td width="135" rowspan="6"><img class="img-circle" width="190" height="190"
                        src="assets/img/user/<?php echo $data->foto; ?>" width="130" height="200"></td>
                <td width="114">Nama</td>
                <td width="10">:</td>
                <td width="270"><?php echo $data->nama; ?></td>

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
                <td>Status</td>
                <td>:</td>
                <td><?php echo $data->type_user; ?></td>
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
            }
        } ?>
        </tbody>
    </table>

    <div class="box-footer">
        <a href="?page=ubah_user&id=<?php echo $login->id_user ?>" class="btn btn-success">Ubah</a>
    </div>

</div>