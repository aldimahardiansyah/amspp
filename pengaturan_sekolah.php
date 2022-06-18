<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-gear"></span>
        Pengaturan Sekolah</h1>
</div>
<div class="content conten-awal">
    <?php
    $query    = mysqli_query($koneksi, "SELECT * FROM sekolah WHERE id_sekolah = '1'");
    $data    = mysqli_fetch_object($query);
    ?>

    <section class="content content-awal">

        <?php
        if ($login->type_user == "admin") { ?>

        <div class="box-body">
            <form action="?page=f_ubah_sekolah&id=1" method="post" class="form-horizontal" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="nama_sekolah" class="col-sm-3 control-label">Nama Sekolah</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->nama_sekolah ?>" type="text" name="nama_sekolah"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_kepsek" class="col-sm-3 control-label">Nama Kepala Sekolah</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->nama_kepsek ?>" type="text" name="nama_kepsek"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="alamat_sekolah" class="col-sm-3 control-label">Alamat Sekolah</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->alamat_sekolah ?>" type="text" name="alamat_sekolah"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah_guru" class="col-sm-3 control-label">Jumlah Guru</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->jumlah_guru ?>" type="text" name="jumlah_guru"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah_jurusan" class="col-sm-3 control-label">Jumlah Jurusan</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->jumlah_jurusan ?>" type="text" name="jumlah_jurusan"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah_ekskul" class="col-sm-3 control-label">Jumlah Ekstrakurikuler</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->jumlah_ekskul ?>" type="text" name="jumlah_ekskul"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="jumlah_partner_instansi" class="col-sm-3 control-label">Jumlah Partner Instansi</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->jumlah_partner_instansi ?>" type="text" name="jumlah_partner_instansi"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="logo_sekolah" class="col-sm-3 control-label">Logo Sekolah</label>
                    <div class="col-sm-4">

                        <input type="file" name="logo_sekolah">
                        <small style="color:#ff0000;">*Mohon hapus spasi pada nama logo jika ada!</small>

                    </div>
                </div>


        </div>
        <div>
            <button class="btn2" type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
        </div>
        </form>
</div>
<?php } else {?>
    <div class="callout callout-danger">
        <h3>Maaf! <span class="glyphicon glyphicon-warning-sign"></span></h3>

        <p>Halaman ini hanya bisa diakses oleh akun ADMIN</p>
    </div>

    <?php        
        } ?>
</section>