			<!-- page content -->
			<div class="right_col" role="main">
			    <div class="">
			        <div class="page-title">
			            <div class="title_left">
			                <h3>Kategori</h3>
			            </div>
			        </div>
			        <div class="clearfix"></div>
			        <div class="row">
			            <div class="col-md-7 col-sm-7 ">
						<?php echo $this->session->flashdata('not'); ?>
			                <div class="x_panel">
			                    <div class="x_content">
			                        <br />
			                        <form method="post" action="<?php echo site_url('kategori');?>">
			                            <div class="item form-group">
			                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Nama Kategori  <span class="text-danger">* : </span>
			                                </label>
			                                <div class="col-md-6 col-sm-6 ">
			                                    <input type="text" name="kategori" class="form-control ">
			                                </div>
											<?= form_error('kategori', '<small class="text-danger pl-1">', '</small>'); ?>
			                            </div>
			                            <div class="ln_solid"></div>
			                            <div class="item form-group ">
			                                <div class="col-md-6 col-sm-6 offset-md-3">
			                                    <button class="btn btn-sm btn-primary " type="reset">Reset</button>
			                                    <button type="submit" class="btn btn-sm btn-success">Submit</button>
			                                </div>
			                            </div>
			                        </form>
			                    </div>
			                </div>
			                <div class="col-md-12 col-sm-6">
			                    <div class="x_panel">
			                        <div class="x_title">
			                            <h2>Kategori Jasa </h2>
			                            <ul class="nav navbar-right panel_toolbox">
			                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
			                                </li>
			                              
			                              
			                            </ul>
			                            <div class="clearfix"></div>
			                        </div>
			                        <div class="x_content">

			                            <table class="table table-striped">
			                                <thead>
			                                    <tr>
			                                        <th>No</th>
			                                        <th>Nama Kategori</th>
			                                        <th>Aksi</th>
			                                       
			                                    </tr>
			                                </thead>
			                                <tbody>
												<?php $no=1; foreach($kategori as $val){?>
			                                    <tr>
			                                        <th scope="row"><?php echo $no;?></th>
			                                        <td><?php echo $val->Kategori;?></td>
			                                        <td><a href="<?php echo site_url('kategori/hapus/'.$val->ID_kategori)?>" onclick="return confirm('yakin akan hapus data ini ??')"" 
													class="btn btn-sm text-white btn-danger">Hapus</a></td>
			                                       
			                                    </tr>
												<?php $no++; }?>
			                                </tbody>
			                            </table>

			                        </div>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>
			</div>
			<!-- /page content -->