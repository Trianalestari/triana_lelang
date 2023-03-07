<div class="container">

	<div class="row">
		<div class="col-md-12">
			
		<?php echo $this->session->flashdata('mesage'); ?>


			<div class="card border-dark">
            <div class="card-header bg-danger text-white">
			<h5>Data Masyarakat</h5>
                

			
			</div>
			
			<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr>
						<th>NO.</th>
						<th>Nama Masyarakat</th>
						<th>Username</th>
						<th>Level</th>
					</tr>
					<?php $i = 1;
					foreach ($tb_masyarakat as $my) : ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $my->nama_lengkap; ?></td>
							<td><?php echo $my->username; ?></td>
							<td><?php echo $my->id_level; ?></td>
                           
						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
				</div>
			</div>
			</div>
		</div>
	</div>
	</div>

</div>
