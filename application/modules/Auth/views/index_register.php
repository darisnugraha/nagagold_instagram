<main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17" style="background-image: url('<?= base_url('assets/images/backgrounds/login-bg.jpg') ?>')">
            	<div class="container">
					<div class="overlay" style="display:none">
					 Loading....
					</div>
            		<div class="form-box">
            			<div class="form-tab">
	            			<ul class="nav nav-pills nav-fill" role="tablist">
							    <li class="nav-item">
							        <a class="nav-link active" id="signin-tab-2" data-toggle="tab" href="#signin-2" role="tab" aria-controls="signin-2" aria-selected="false">Daftar Member Baru</a>
							    </li>
							</ul>
							<div class="tab-content">
							    <div class="tab-pane fade show active" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                                <?php $attribute = array('class' => 'color', 'id' => 'user' );
                                    echo form_open('ceklogin', $attribute); ?>
							    		<div class="form-group">
							    			<label for="singin-email-2">Email or No Hp *</label>
							    			<input type="text" class="form-control" placeholder="Masukan Email atau No Hp" name="emailorphone" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-group">
							    			<label for="singin-password-2">Password *</label>
							    			<input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
							    		</div><!-- End .form-group -->

							    		<div class="form-footer">
							    			<button onclick="$('.overlay').show();" type="submit" class="btn btn-outline-primary-2">
			                					<span>LOG IN</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
											<a href="#" class="forgot-link">Forgot Your Password?</a>
							    		</div><!-- End .form-footer -->
									<?= form_close() ?>
										<div class="form-choice">
											<p class="text-center">Sudah Punya Akun ??</p>
											<div class="row">
												<div class="col-sm-6">
													<a href="<?= base_url('login') ?>" class="btn btn-login btn-g">
														Login Sekarang
													</a>
												</div><!-- End .col-6 -->
												<div class="col-sm-6">
													<a href="#" class="btn btn-login  btn-f">
														Cek Member Lama
													</a>
												</div><!-- End .col-6 -->
											</div><!-- End .row -->
										</div>
							    </div><!-- .End .tab-pane -->
							</div><!-- End .tab-content -->
						</div><!-- End .form-tab -->
            		</div><!-- End .form-box -->
            	</div><!-- End .container -->
            </div><!-- End .login-page section-bg -->
        </main><!-- End .main -->