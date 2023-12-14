			<!-- page content -->
			<div class="right_col" role="main">
				<div class="">
					<div class="page-title">
						<div class="title_left">
							<h3>Edit Profile</h3>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<div class="col-md-12 col-sm-12 ">
							<div class="x_panel">
								<div class="x_title">
									<h2>Profile Saya</h2>
								</div>
								
								<div class="x_content">
								
									<br />
									<form  method="post" action="<?php echo site_url('profil/edit_profil_admin');?>" >
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Lengkap  <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="nama_lengkap"  class="form-control " 
                                                 value="<?= $user['Nama_lengkap'];?>">
											</div>
                                            <?= form_error('nama_lengkap', '<small class="text-danger pl-1">', '</small>'); ?>
										</div>
										<div class="item form-group">
											<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Email <span class="required">*</span>
											</label>
											<div class="col-md-6 col-sm-6 ">
												<input type="text" name="email" class="form-control"
                                                value="<?= $user['Email'];?>">
											</div>
                                            <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
										</div>
										<div class="item form-group">
											<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">No Telfon</label>
											<div class="col-md-6 col-sm-6 ">
												<input  class="form-control" type="text" name="no_telfon"
                                                value="<?= $user['No_telp'];?>">
											</div>
                                            <?= form_error('no_telfon', '<small class="text-danger pl-1">', '</small>'); ?>
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
