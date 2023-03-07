<div class="container-fluid">

    <div class="card">
        <div class="card-body">
            <?php foreach ($tb_barang as $brg) : ?>
                <div class="col-md-4">
                    <img src="<?= base_url('assets/images/barang/witch.png') ?>" class="card-img-top" width="100" height="300">
                </div>
                
                <div class="col-md-6"><br>
                <h1><strong><?= $brg->nama_barang; ?></strong></h1>
                <hr>
            </div>

                <div class="col-md-3"><br>
                <p><strong>CURRENT BID</strong></p>
                <strong>Rp.<?= $brg->harga_awal; ?></strong>
                <hr>
                </div>
            
            <div class="col-md-3"><br>
            <p><strong>ENDS IN</strong></p>
            <strong><?= $brg->tgl; ?></strong> 
            <br>
            <hr>
        </div>
        
        <div class="col-md-3"><br>
        <?php if ($this->session->userdata('username')) : ?>
                         <p><strong>PLACE BID</strong></p>
                         <input type="text" >
                         <button class="btn btn-warning" type="submit" name="submit">Confirm Bid</button>
                         <?php else : ?>
                        <p><strong>PLACE BID</strong></p>
                        <p class="text-danger"><strong>you need to login to bid</strong></p>

                    <?php endif; ?>
            </div>

                <div class="col-md-12"><br>
                <p><strong>DESCRIPTION</strong></p>
                    <p><?= $brg->deskripsi_barang; ?></p>
                </div>
                <br><br><br><br>
            <?php endforeach; ?>
        </div>
    </div>

</div>