<div class="container">

	<div class="row">
		<div class="col-md-12">
		
			<?php echo $this->session->flashdata('message'); ?>

			<div class="card border-dark">
            <div class="card-header bg-danger text-white">
             <h5>Data Admin</h5>   

			<a href="<?php echo base_url('admin/data_admin/tambah_admin') ?>" class="btn btn-sm btn-warning float-right">Tambahkan admin</a>
			</div>
			
			<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr>
						<th>NO.</th>
						<th>Nama Petugas</th>
						<th>Username</th>
						<th>Action</th>
					</tr>
					<?php $i = 1;
					foreach ($tb_petugas as $ptgs) : ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $ptgs->nama_petugas; ?></td>
							<td><?php echo $ptgs->username; ?></td>
                            <td>
								<a href="<?php echo base_url('admin/data_admin/edit/' . $ptgs->id_petugas) ?>" class="btn btn-sm btn-primary">Edit</a>
								<a href="<?php echo base_url('admin/data_admin/delete/' . $ptgs->id_petugas) ?>" class="btn btn-sm btn-danger">Delete</a>


							</td>
						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
				</div></div>
			</div>
		</div>
	</div>

</div>
