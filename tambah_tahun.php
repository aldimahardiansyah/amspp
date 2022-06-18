<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-plus"></span>
        TAMBAH DATA <small>Tahun Ajaran</small></h1>
</div>

<section class="content content-awal">
    <div class="box-body">
        <form action="?page=f_tambah_tahun" method="post" class="form-horizontal">


            <div class="form-group">
                <label for="id_tahun" class="col-sm-2 control-label">ID Tahun</label>
                <div class="col-sm-4">
                    <p>
                        <input type="number" name="id_tahun" class="form-control">
                    </p>
                </div>
            </div>

            <div class="form-group">
                <label for="tahun_ajaran" class="col-sm-2 control-label">Tahun Ajaran</label>
                <div class="col-sm-4">
                    <p>
                        <input type="text" name="tahun_ajaran" class="form-control">
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
        <button class="btn2" type="submit" name="submit" class="btn btn-primary">Tambah</button>
    </div>
    </form>
    </div>
</section>