<section class="konten mt-2">
    <div class="container-fluid">

        <div class="card border-dark">
            <div class="card-header bg-danger text-white">
               


                <a href="<?= base_url('admin/Data_admin') ?>" class="btn btn-sm btn-light float-right"> Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('admin/Data_admin/insert') ?>">
                
                    <div class="form-group">
                        <label for="">nama petugas</label>
                        <input type="text" name="nama_petugas" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label for="">username</label>
                        <input type="text" name="username" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label for="">password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                          <label for="">Role</label>
                          <select name="id_level" id="id_level" class="form-control">
                              <option value="" class="value">--- Pilih Role ---</option>
                              <?php foreach ($tb_level as $lvl) : ?>
                                    <option value="<?= $lvl['id_level']; ?>"><?= $lvl['level']; ?></option>
                              <?php endforeach; ?>
                          </select>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>