
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
                                    <h1 class="h4 text-gray-900 mb-4">LOGIN LELANG</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username"  placeholder="username" value="<?= set_value('username'); ?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
										<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
										<div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">Ingatkan saya</label>
											</div>
										</div>
										
										<!-- button login -->
										<button type="submit" name="login" class="btn btn-primary btn-user btn-block" value="true">
											Login
										</button>
										
										
                                </form>
                                <hr>
                                
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/register') ?>"> Buat Akun!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>