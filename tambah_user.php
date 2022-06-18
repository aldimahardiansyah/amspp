<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Tambah User</h1>
</div>

<section class="content content-awal">
    <div>
        <div class="box-body">
            <form action="?page=f_tambah_user" method="post" class="form-horizontal" enctype="multipart/form-data">


                <div class="form-group">
                    <label for="nama" class="col-sm-2 control-label">Nama Lengkap</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama" placeholder="Nama Lengkap" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Alamat Email</label>
                    <div class="col-sm-4">
                        <input type="text" name="email" placeholder="Alamat Email" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="telp" class="col-sm-2 control-label">Telepon / HP</label>
                    <div class="col-sm-4">
                        <input type="text" name="telp" placeholder="Telepon" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="username" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-4">
                        <input type="text" name="username" placeholder="Username" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="password" name="password" placeholder="Password" class="form-control">
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

                        <input type="file" name="gambar">
                        <small style="color:#ff0000;">*Foto harus memiliki panjang dan lebar yang sama (Persegi)</small>

                    </div>
                </div>

        </div>
        <div class="box-footer">
            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
    </div>
</section>