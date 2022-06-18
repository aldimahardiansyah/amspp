<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-user"></span>
        UBAH DATA <small>Siswa</small></h1>
</div>
<div class="content conten-awal">
    <?php
    $id        = $_GET['id'];
    $query    = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn = '$id'");
    $query1    = mysqli_query($koneksi, "SELECT * FROM siswa INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas INNER JOIN tahun_ajaran ON tahun_ajaran.id_tahun=siswa.id_tahun WHERE nisn = '$id'");
    $data    = mysqli_fetch_object($query);
    $data1    = mysqli_fetch_object($query1);
    ?>

    <section class="content content-awal">

        <?php
        if ($login->type_user == "admin") { ?>

        <div class="box-body">
            <form action="?page=f_ubah_siswa&id=<?php echo $data->nisn; ?>" method="post" class="form-horizontal">


                <div class="form-group">
                    <label for="nisn" class="col-sm-2 control-label">NISN</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data1->nisn ?>" type="number" name="nisn" class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nis" class="col-sm-2 control-label">NIS</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data1->nis ?>" type="number" name="nis" class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Siswa</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data1->nama ?>" type="text" name="nama" class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                    <div class="col-sm-4">
                        <select name="jk" class="form-control">
                            <option selected disabled value='#'>--Pilih Jenis Kelamin--</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_kelas" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-4">
                        <select name="id_kelas" class="form-control">
                            <option selected disabled value='#'>
                                ---Pilih Kelas--
                            </option>
                            <?php
                                $sql1 = mysqli_query($koneksi, "SELECT * FROM kelas");
                                while ($bg1 = mysqli_fetch_object($sql1)) {
                                    echo "
								<option value='$bg1->id_kelas'>$bg1->nama_kelas</option>
								";
                                }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data1->alamat ?>" type="text" name="alamat" class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="no_telp" class="col-sm-2 control-label">No. Handphone</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data1->nomor_telp ?>" type="number" name="no_telp"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_tahun" class="col-sm-2 control-label">Tahun Masuk</label>
                    <div class="col-sm-4">
                        <select name="id_tahun" class="form-control">
                            <option selected disabled value='#'>
                                --Tahun Masuk Siswa--
                            </option>
                            <?php
                                $sql1 = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran");
                                while ($bg1 = mysqli_fetch_object($sql1)) {
                                    echo "
								<option value='$bg1->id_tahun'>$bg1->tahun_ajaran</option>
								";
                                }
                                ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php 
                            $password   =($data1->password); 
                            echo $password; ?>" 
                            type="password" name="password" class="form-control">
                        </p>
                    </div>
                </div>

        </div>
        <div>
            <button class="btn2" type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
        </div>
        </form>
</div>
<?php } else {
            //asdfghjkl,mncxzsdrtyuiop;l,mnbhcgvjknfdsd
        } ?>
</section>