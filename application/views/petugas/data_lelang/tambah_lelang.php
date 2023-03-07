<section class="konten mt-2">
    <div class="container-fluid">

        <div class="card border-dark">
            <div class="card-header bg-danger text-white">
                


                <a href="<?= base_url('petugas/Data_lelang/') ?>" class="btn btn-sm btn-light float-right"> Kembali</a>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
					<?= validation_errors() ?>
					<div class="form-group">
						<label for="products"><strong>Barang</strong><label>
						<select name="products" id="products" class="form-control">
							<option value="">--- Pilih Barang ---</option>
							<?php foreach ($products as $product) : ?>
								<option value="<?= $product->id_barang ?>" <?= set_select('product', 
								$product->id_barang) ?>><?= $product->nama_barang ?></option>
							<?php endforeach ?>
						</select>
					</div>
					<div class="form-group row">
					<div class="col-sm-2">
							<label for="tgl_lelang"><strong>Tanggal Lelang</strong></label>
							<input type="date" name="tgl_lelang" id="tgl_lelang" value="<?= 
							set_value('tgl_lelang')?>"\ placeholder="Enter..."/>
					</div>
					<div class="col-sm-2">
							<label for="jam_lelang"><strong>Jam Lelang</strong></label>
							<input type="time" name="jam_lelang" id="jam_lelang" value="<?= 
							set_value('jam_lelang') ?>"\placeholder="Enter..."/>
					</div>
					
					</div>
					<div class="form_group">
							<label for="petugas"><strong>Petugas</strong></label>
							<select name="petugas" id="petugas" class="form_control">
							<option value="">---Pilih Petugas---</option>
							<?php foreach ($staffs as $staff) : ?>
								<option value="<?= $staff->id_petugas ?>" <?= set_select('petugas', 
								$staff->id_petugas) ?>><?= $staff->nama_petugas ?>
								</option>
								<?php endforeach; ?>
								</select>
								<div>
					<div class="form-group">
						<label for="status"><strong>Status</strong></label><br>
						<label class="radio-inline">
							<input type="radio" name="status" value="dibuka" <?= set_radio('status', 'dibuka') ?>>
							Dibuka</label>
							<label class="radio-inline">
							<input type="radio" name="status" value="ditutup" <?= set_radio('status', 'ditutup') ?>>
							Ditutup</label>
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
					</div>
				</form>
            </div>
        </div>
    </div>
    </div>
</section>
