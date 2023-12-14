			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Ubah Password Admin</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
                        <?php echo $this->session->flashdata('not'); ?>
							<div class="x_panel">
								<div class="x_title">
									<h2 class="mt-2">Password Admin</h2>
								</div>
								<div class="x_content">
									<br />
									<form  method="post" action="<?php echo site_url('profil/ubah_password');?>" >
                                    <input type="hidden" name="idAdmin" value="<?= $user['ID_admin'];  ?>">
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Password Lama  <span class=" text-danger">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="password" class="form-control " >
											</div>
                                            <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Password Baru <span class=" text-danger">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="password" name="password_baru" class="form-control">
											</div>
                                            <?= form_error('password_baru', '<small class="text-danger pl-1">', '</small>'); ?>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Konfirmasi</label>
											<div class="col-md-6 col-sm-6 ">
												<input  class="form-control" type="password" name="konfirmasi">
											</div>
                                            <?= form_error('konfirmasi', '<small class="text-danger pl-1">', '</small>'); ?>
										</div>
										<div class="ln_solid"></div>
										<div class="item form-group">
											<div class="col-md-6 col-sm-6 offset-md-3">
												<a href="<?php echo site_url('profil') ?>" class="btn btn-primary"  type="button">Cancel</a>
												<button class="btn btn-primary" type="reset">Reset</button>
												<button type="submit" class="btn btn-success">Submit</button>
											</div>
										</div>

									</form>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>

			</div>
			<!-- /page content -->
