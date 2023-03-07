<section class="konten mt-2">
    <div class="container-fluid">

        <div class="card border-dark">
            <div class="card-header bg-danger text-white">
             
                <a href="<?= base_url('petugas/Data_barang') ?>" class="btn btn-sm btn-light float-right"> Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('petugas/Data_barang/insert') ?>" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label for="">nama barang</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="enter the product name" required>
                    </div>
                    <div class="form-group">
                        <label for="">deskripsi barang</label>
                        <textarea type="text" rows="10" name="deskripsi_barang" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">harga barang</label>
                        <input type="text" name="harga_awal" class="form-control" placeholder="enter the product price" required>
                    </div>
                    <div class="form-group">
                        <label for="">gambar</label>
                        <input type="file" name="gambar" class="form-control" required>
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