<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-plus"></span>
        TAMBAH DATA <small>Siswa</small></h1>
</div>

<section class="content content-awal">
    <div class="box-body">
        <form action="?page=f_tambah_siswa" method="post" class="form-horizontal">


            <div class="form-group">
                <label for="nisn" class="col-sm-2 control-label">NISN</label>
                <div class="col-sm-4">
                    <p>
                        <input type="number" name="nisn" class="form-control">
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label for="nis" class="col-sm-2 control-label">NIS</label>
                <div class="col-sm-4">
                    <p>
                        <input type="number" name="nis" class="form-control">
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label for="nama" class="col-sm-2 control-label">Nama Siswa</label>
                <div class="col-sm-4">
                    <p>
                        <input type="text" name="nama" class="form-control">
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
                        <input type="text" name="alamat" class="form-control">
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label for="no_telp" class="col-sm-2 control-label">No. Handphone</label>
                <div class="col-sm-4">
                    <p>
                        <input type="number" name="no_telp" class="form-control">
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label for="id_tahun" class="col-sm-2 control-label">Tahun Masuk</label>
                <div class="col-sm-4">
                    <select name="id_tahun" class="form-control">
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

    </div>
    <div>
        <button class="btn2" type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </div>
    </form>
    </div>
</section>