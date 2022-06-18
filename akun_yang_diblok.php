<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Akun yang Diblokir</h1>
</div>
<?php

if ($login->type_user == "tata usaha"){
				 
?>
<section class="content content-awal">
    <div class="callout callout-danger">
        <h4>Maaf! <span class="glyphicon glyphicon-warning-sign"></span></h4>

        <p>Halaman ini hanya bisa diakses oleh akun ADMIN</p>
    </div>
</section>
<?php } ?>
<?php

if ($login->type_user == "admin"){
				 
?>
<section class="content content-awal">
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr bgcolor="#CCCCCC">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>

                    <th>Hak Akses</th>
                    <th>Aksi</th>


                </tr>
            </thead>


            <?php
					$query 	= "SELECT * FROM tb_user WHERE status_akun = 'blok'";
					$sql	= mysqli_query ($koneksi, $query);
					while ($data = mysqli_fetch_object ($sql)) {
						@$no++;
						?>
            <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data->nama; ?></td>
                    <td><?php echo $data->username; ?></td>

                    <td>
                        <form action="?page=simpan_perubahan&id=<?php echo $data->id_user ?>" method="POST">
                            <div class="col-md-6"> <select class="form-control" name="type_user">

                                    <option value="<?php echo $data->type_user ?>"><?php echo $data->type_user ?>
                                    </option>
                                    <?php if($data->type_user == "tata usaha" ){ ?>
                                    <option value="admin">Admin</option>
                                    <?php } ?>
                                    <?php if($data->type_user == "admin" ){ ?>
                                    <option value="tata usaha">Tata Usaha</option>
                                    <?php } ?>
                                </select></div>
                            <button type="submit" name="submit" class="btn btn-success">Simpan &nbsp;&nbsp;<span
                                    class="glyphicon glyphicon-save"></span></button>
                        </form>
                    </td>



                    <td>


                        <a class="btn btn-success" href="?page=unblok_akun&id=<?php echo $data->id_user; ?>"
                            onclick="return confirm('anda yakin ingin mengubah data?');">Unblok Akun&nbsp;&nbsp;<span
                                class="glyphicon glyphicon-ok"></span></a>




                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>

<a href="?page=user" class="btn btn-info"><span class="glyphicon glyphicon-chevron-left">&nbsp;&nbsp;Kembali</span></a>

<?php } ?>