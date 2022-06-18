<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-user"></span>
        UBAH DATA <small>Tahun</small></h1>
</div>
<div class="content conten-awal">
    <?php
    $id        = $_GET['id'];
    $query    = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran WHERE id_tahun = '$id'");
    $data    = mysqli_fetch_object($query);
    $query1    = mysqli_query($koneksi, "SELECT * FROM tahun_ajaran");
    $data1    = mysqli_fetch_object($query);
    ?>

    <section class="content content-awal">

        <?php
        if ($login->type_user == "admin") { ?>

        <div class="box-body">
            <form action="?page=f_ubah_tahun&id=<?php echo $data->id_tahun; ?>" method="post" class="form-horizontal">


                <div class="form-group">
                    <label for="id_tahun" class="col-sm-2 control-label">ID Tahun</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->id_tahun ?>" type="number" name="id_tahun"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="tahun_ajaran" class="col-sm-2 control-label">Tahun Ajaran</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->tahun_ajaran ?>" type="text" name="tahun_ajaran"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="status" class="col-sm-2 control-label">Status</label>
                    <div class="col-sm-4">
                        <p>
                            <select name="status" class="form-control">
                                <option disabled selected>--Pilih Status Tahun--</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non-Aktif">Non-Aktif</option>
                            </select>
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