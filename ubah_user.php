<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-user"></span>
        UBAH DATA <small>User</small></h1>
</div>
<div class="content conten-awal">
    <?php
    $id        = $_GET['id'];
    $query    = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
    $data    = mysqli_fetch_object($query);
    ?>

    <section class="content content-awal">

        <?php
        if ($login->type_user == "admin") { ?>

        <div class="box-body">
            <form action="?page=f_ubah_user&id=<?php echo $data->id_user; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama" value="<?php echo $data->nama ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Alamat Email</label>
                    <div class="col-sm-4">
                        <input type="text" name="email" value="<?php echo $data->email ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telp" class="col-sm-2 control-label">Telepon / HP</label>
                    <div class="col-sm-4">
                        <input type="text" name="telp" value="<?php echo $data->telp ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" name="username" value="<?php echo $data->username ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" value="<?php echo $data->passwordd ?>"
                            class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="type_user" class="col-sm-2 control-label">Hak Akses Sebagai</label>
                    <div class="col-sm-4">
                        <select class="form-control" name="type_user">
                            <option value="-">-- Pilih Hak Akses --</option>
                            <option value="admin">Admin</option>
                            <option value="tata usaha">Tata Usaha</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="gambar" class="col-sm-2 control-label">Foto User</label>
                    <div class="col-sm-4">

                        <input type="file" name="foto">
                        <small style="color:#ff0000;">*Nama foto tidak memiliki spasi serta foto harus memiliki panjang dan lebar yang sama (Persegi)</small>
                        
                    </div>
                </div>
        </div>
        <div>
            <input class="btn2" type="submit" name="submit" value="SIMPAN" class="btn btn-primary">
        </div>
        </form>
</div>
<?php } else { ?>

           <div class="box-body">
            <form action="?page=f_ubah_user1&id=<?php echo $data->id_user; ?>" method="post" class="form-horizontal" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama" value="<?php echo $data->nama ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Alamat Email</label>
                    <div class="col-sm-4">
                        <input type="text" name="email" value="<?php echo $data->email ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telp" class="col-sm-2 control-label">Telepon / HP</label>
                    <div class="col-sm-4">
                        <input type="text" name="telp" value="<?php echo $data->telp ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" name="username" value="<?php echo $data->username ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" value="<?php echo $data->passwordd ?>"
                            class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="gambar" class="col-sm-2 control-label">Foto User</label>
                    <div class="col-sm-4">

                        <input type="file" name="gambar">
                        <small style="color:#ff0000;">*Nama foto tidak memiliki spasi serta foto harus memiliki panjang dan lebar yang sama (Persegi)</small>

                    </div>
                </div>
        </div>
        <div>
            <button class="btn2" type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
        </div>
        </form>
        <?php } ?>
</section>