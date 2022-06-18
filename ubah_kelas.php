<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-user"></span>
        UBAH DATA <small>Kelas</small></h1>
</div>
<div class="content conten-awal">
    <?php
    $id        = $_GET['id'];
    $query    = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas = '$id'");
    $data    = mysqli_fetch_object($query);
    $query1    = mysqli_query($koneksi, "SELECT * FROM kelas");
    $data1    = mysqli_fetch_object($query);
    ?>

    <section class="content content-awal">

        <?php
        if ($login->type_user == "admin") { ?>

        <div class="box-body">
            <form action="?page=f_ubah_kelas&id=<?php echo $data->id_kelas; ?>" method="post" class="form-horizontal">


                <div class="form-group">
                    <label for="id_kelas" class="col-sm-2 control-label">ID Kelas</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->id_kelas ?>" type="number" name="id_kelas"
                                class="form-control">
                        </p>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama_kelas" class="col-sm-2 control-label">Kelas</label>
                    <div class="col-sm-4">
                        <p>
                            <input value="<?php echo $data->nama_kelas ?>" type="text" name="nama_kelas"
                                class="form-control">
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