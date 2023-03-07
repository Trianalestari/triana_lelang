<!-- <body>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="text-center">
				<h2><?php echo $page_title ?></h2>
				<small>Please register to access this website</small>
			</div>
			<?php foreach ($errors as $error) : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true"><i class="glyphicon glyphicon-remove"></i></span></button>
					<strong>Attention !</strong> <?php echo $error; ?>
				</div>
			<?php endforeach; ?>
			
			<form action="" method="post">
				<div class="form-group">
					<label for="fullname">Nama Lengkap</label>
					<input type="text" name="fullname" id="fullname" class="form-control" value="<?php echo set_value('fullname');?>" placeholder="Type your fullname">
					<?php echo form_error('fullname') ?>
				</div>
				<div class="form-group">
					<label for="username">Nama Pengguna</label>
					<input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username');?>" placeholder="Type your username">
					<?php echo form_error('username') ?>
				</div>
				<div class="form-group">
					<label for="password">Kata Sandi</label>
					<input type="password" name="password" id="password" class="form-control" placeholder="Type your password">
					<?php echo form_error('password') ?>
				</div>
				<div class="form-group">
					<label for="repassword">Konfirmasi Kata Sandi</label>
					<input type="password" name="repassword" id="repassword" class="form-control" placeholder="Retype your password">
					<?php echo form_error('repassword') ?>
				</div>
				<div class="form-group">
					<button type="submit" name="register" value="true" class="btn btn-primary">Register Sekarang</button>
					<button type="reset" class="btn btn-danger">Reset</button>
				</div>
			</form>
		</div>
	</div>
</body> -->



<div class="container">
	
	<!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <!-- form control -->
                    <div class="row">
						<div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registrasi Pages!</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="">
                               
									<div class="form-group">
										<input type="text" name="fullname" id="fullname" class="form-control form-control-user form-control-user" value="<?php echo set_value('fullname');?>" placeholder="fullname">
									<?php echo form_error('fullname') ?>
										</div>
									<div class="form-group">
										<input type="text" name="username" id="username" class="form-control form-control-user" value="<?php echo set_value('username');?>" placeholder="username">
										<?php echo form_error('username') ?>
									</div>
									<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input type="password" name="password" id="password" class="form-control form-control-user" placeholder="password">
										<?php echo form_error('password') ?>
									</div>
								<div class="form-group col-sm-6">
										<input type="password" name="repassword" id="repassword" class="form-control form-control-user" placeholder=" repeat password">
										<?php echo form_error('repassword') ?>
								</div>
				
			
								<button type="submit" name="register" value="true" class="btn btn-primary  btn-user btn-block">Register Sekarang</button>
								<button type="reset" class="btn btn-danger btn-user btn-block">Reset</button>

                                </form>
                                <hr>
                             
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/login') ?>"> Already have an account? Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
