<div class="container-fluid">

        <div class="card-body-dark">
           <div class="card-header bg-primary text-white">
           <a href="<? base_url('history') ?>" class="btn btn-sm btn-light float_right"> Kembali</a>
            </div>


                <br>
                <div class="col-md-6">
                <div class="alert alert-primary" role="alert">
                <?php
                if ($product->harga_akhir) : ?>
                <strong>
                <?= $product->pemenang ?> memenangkan lelang ini dengan harga Rp.<?= number_format
                ($product->harga_akhir, 2, ',','.'); ?> 
                </storng>
                <br><br>

                <?php if ($product->pemenang == $this->session->userdata('nama_lengkap')) : ?>
                      <a href="<?= base_url('history/cetak_pemenang/') . $product->id_lelang ?>" class="btn btn-light text-primary"><strong>Cetak Menang</strong></a>
                <?php endif; ?>
            
                <?php else : ?>
                <strong>
                belum ada pemenang, bid dengan harga lebih tinggi untuk memenangkan lelang ini
                <strong>
                <?php endif; ?>

                </div>

                <div class="container">
                <br>
                <div class="row">
                <div class="card-header bg-warning text-white">
                Detail Barang
                </div>
                <div class="card-body">
                <p><strong>Nama Barang: </strong> <?= $product->nama_barang; ?></p>
                <p><strong>Harga Awal: </strong> Rp. <?= number_format($product->harga_awal1, 2, ',','.'); ?></p>
                <p><strong>Deskripsi Barang: </strong> <br> <?= $product->deskripsi_barang; ?></p> 
                </div>
                </div>
                </div>

                <div class="col-md-4">
                <div class="card border-dark"></div>
                    <div class="card-header bg-warning text-white">
                                    History Bid
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('petugas/auction/detail_barang/') . $product->id_lelang ?>"
                                method="POST">
                                <?php if ($product->harga_akhir) : ?>
                                <?php else : ?>

                                <p class="text-warning"><strong>TAWAR SEKARANG</strong></p>
                                      <input type="number" name="price" id="price" min="<?= $product->harga_awal ?>" >
                                      <button class="btn btn-warning" type="submite" name="bid" value="true">BID !</button>
                                      </form>

                                      
                                <?php foreach ($history as $hist) : ?>
                                    <p><strong><?= $hist->nama_lengkap ?></strong></p>
                                    Rp. <?= number_format($hist->penawaran_harga, 2, ',', '.') ?></p>
                                    <?php endforeach; ?>
                                </div>
                                </div>

                            <div class="col-md-4">
                            <div class="card border-dark">
                                <div class="card-header bg-warning text-white">
                                        Bid Tertinggi
                                    </div>
                                    <div class="card-body">

                                    <?php if (empty($max_bid)) : ?>
                                    <div class="alert alert-info">
                                        <p>Belum ada yang melakukan bid</p>
                                    </div>
                                    <?php else : ?>
                                            <p><strong>Nama</strong>: <?= $max_bid->nama_lengkap; ?>

                                            </p>
                                            <p><strong>Harga</strong>: <?= number_format($max_bid->penawaran_harga, 2, ',
                                            ', '.'); ?></p>
                                            <!-- <a href="<?= base_url('petugas/data_lelang/finish/').
                                            ($max_bid->id_lelang ?>"
                                            class="btn btn-primary">Jadikan Pemenang</a> -->
                                           
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>
                                </div>
                                <br>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>

